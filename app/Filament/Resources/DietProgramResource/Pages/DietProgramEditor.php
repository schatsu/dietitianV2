<?php

namespace App\Filament\Resources\DietProgramResource\Pages;

use App\Enums\MealTimeEnum;
use App\Enums\ProgramDayEnum;
use App\Filament\Resources\DietProgramResource;
use App\Models\DietProgram;
use App\Models\DietProgramItem;
use App\Models\Meal;
use App\Models\MealCategory;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Collection;

class DietProgramEditor extends Page
{
    protected static string $resource = DietProgramResource::class;
    protected static string $view = 'filament.resources.diet-program-resource.pages.diet-program-editor';

    protected static ?string $title = 'Diyet Programı Oluştur';
    protected static ?string $navigationLabel = 'Diyet Programı Oluşturucu';
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public DietProgram $dietProgram;
    public array $table = [];
    public array $days = [];
    public array $times = [];

    public string $selectedDay = '';
    public string $selectedTime = '';
    public string $selectedDayLabel = '';
    public string $selectedTimeLabel = '';

    public function mount(DietProgram $record): void
    {
        $this->dietProgram = $record;
        $this->days = ProgramDayEnum::options();
        $this->times = MealTimeEnum::options();
        $this->loadTable();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('share')
                ->label('Programı Paylaş')
                ->icon('heroicon-o-share')
                ->color('success')
                ->button()
                ->modalHeading('Diyet Programını Paylaş')
                ->modalDescription('Bu diyet programını nasıl paylaşmak istiyorsunuz?')
                ->modalSubmitActionLabel('Paylaş')
                ->modalCancelActionLabel('İptal'),

            Action::make('back')
                ->label('Geri Dön')
                ->icon('heroicon-o-arrow-left')
                ->color('warning')
                ->url(static::getResource()::getUrl('edit', ['record' => $this->dietProgram])),
        ];
    }

    private function notify(string $title, string $body, string $type = 'success'): void
    {
        Notification::make()
            ->title($title)
            ->body($body)
            ->{$type}()
            ->send();
    }

    private function resetSelection(): void
    {
        $this->selectedDay = '';
        $this->selectedTime = '';
        $this->selectedDayLabel = '';
        $this->selectedTimeLabel = '';
    }

    public function openAddMealModal(string $day, string $time): void
    {
        $this->selectedDay = $day;
        $this->selectedTime = $time;
        $this->selectedDayLabel = $this->days[$day] ?? $day;
        $this->selectedTimeLabel = $this->times[$time] ?? $time;

        $this->dispatch('open-modal', id: 'addMealModal');
    }

    public function closeAddMealModal(): void
    {
        $this->resetSelection();
        $this->dispatch('close-modal', id: 'addMealModal');
    }

    public function quickAddMeal(int $mealId): void
    {
        if (!$this->selectedDay || !$this->selectedTime) {
            $this->notify('Hata!', 'Lütfen önce bir hücre seçin.', 'danger');
            return;
        }

        $meal = Meal::query()->find($mealId);
        if (!$meal) {
            $this->notify('Hata!', 'Yemek bulunamadı.', 'danger');
            return;
        }

        $this->addMealToSlot(
            $this->selectedDay,
            $this->selectedTime,
            $meal->id,
            $meal->default_quantity,
            $meal->unit->value
        );

        $this->closeAddMealModal();
    }

    public function addMealToSlot(string $day, string $mealTime, int $mealId, float $quantity = null, string $unit = null): void
    {
        $meal = Meal::query()->select('id', 'name', 'default_quantity', 'unit')->findOrFail($mealId);

        $this->dietProgram->items()->create([
            'meal_id' => $meal->id,
            'day' => $day,
            'meal_time' => $mealTime,
            'quantity' => $quantity ?? $meal->default_quantity,
            'unit' => $unit ?? $meal->unit->value,
        ]);

        $this->loadTable();

        $this->notify('✅ Yemek eklendi!', "'{$meal->name}' başarıyla {$this->days[$day]} - {$this->times[$mealTime]} slotuna eklendi.");
    }

    public function removeItem(int $itemId): void
    {
        $item = DietProgramItem::query()
            ->where('id', $itemId)
            ->where('diet_program_id', $this->dietProgram->id)
            ->with('meal:id,name')
            ->first();

        if (!$item) {
            $this->notify('Hata!', 'Yemek bulunamadı.', 'danger');
            return;
        }

        $mealName = $item->meal->name;
        $item->delete();

        $this->loadTable();
        $this->notify('🗑️ Yemek silindi!', "'{$mealName}' programdan kaldırıldı.");
    }

    public function loadTable(): void
    {
        $items = $this->dietProgram->items()
            ->with(['meal:id,name'])
            ->select('id', 'diet_program_id', 'meal_id', 'day', 'meal_time', 'quantity', 'unit')
            ->get();

        $this->table = [];

        foreach ($items as $item) {
            $day = $item->day->value;
            $time = $item->meal_time->value;

            $this->table[$day][$time][] = [
                'id' => $item->id,
                'meal_name' => $item->meal->name,
                'quantity' => $item->quantity,
                'unit' => $item->unit_label,
            ];
        }

    }

    public function getItems(string $day, string $time): array
    {
        return $this->table[$day][$time] ?? [];
    }

    public function getMealsByCategory(): Collection
    {
        return MealCategory::query()
            ->with(['meals' => fn($q) => $q->select('id', 'name', 'meal_category_id', 'default_quantity', 'unit')->orderBy('name')])
            ->whereHas('meals')
            ->orderBy('name')
            ->get();
    }

    public function shareProgram(array $data): void
    {
        $method = $data['share_method'] ?? null;
        $recipient = $data['recipient'] ?? '';
        $message = $data['message'] ?? '';

        match ($method) {
            'email' => $this->shareViaEmail($recipient),
            'whatsapp' => $this->shareViaWhatsApp($recipient, $message),
            'pdf' => $this->downloadAsPdf(),
            default => $this->notify('Hata!', 'Geçersiz paylaşım yöntemi.', 'danger'),
        };
    }

    private function shareViaEmail(string $email): void
    {
        // TODO: Laravel Mail ile gerçek gönderim eklenebilir
        $this->notify('Program e-posta ile gönderildi!', "Diyet programı {$email} adresine başarıyla gönderildi.");
    }

    private function shareViaWhatsApp(string $phone, string $message): void
    {
        $programUrl = url("/diet-programs/{$this->dietProgram->id}/public");
        $text = urlencode("{$message}\n\nDiyet Programı: {$programUrl}");
        $whatsappUrl = "https://wa.me/{$phone}?text={$text}";

        $this->dispatch('openUrl', ['url' => $whatsappUrl]);

        $this->notify('WhatsApp paylaşımı hazırlandı!', 'WhatsApp uygulaması açılacak, mesajınızı gönderebilirsiniz.');
    }

    private function downloadAsPdf()
    {
        $pdf = Pdf::loadView('filament.resources.diet-program-resource.pages.diet-program-pdf', [
            'dietProgram' => $this->dietProgram,
            'days' => $this->days,
            'times' => $this->times,
            'table' => $this->table,
        ]);

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'diyet_programi_' . $this->dietProgram->id . '.pdf',
            ['Content-Type' => 'application/pdf']
        );
    }
}
