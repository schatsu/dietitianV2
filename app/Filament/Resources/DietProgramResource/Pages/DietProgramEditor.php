<?php

namespace App\Filament\Resources\DietProgramResource\Pages;

use App\Enums\MealTimeEnum;
use App\Enums\ProgramDayEnum;
use App\Filament\Resources\DietProgramResource;
use App\Jobs\SendDietProgramEmailJob;
use App\Models\DietProgram;
use App\Models\DietProgramItem;
use App\Models\Meal;
use App\Models\MealCategory;
use App\Notifications\DietProgramSharedNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DietProgramEditor extends Page
{
    protected static string $resource = DietProgramResource::class;
    protected static string $view = 'filament.resources.diet-program-resource.pages.diet-program-editor';

    protected static ?string $title = 'Diyet Programı Oluştur';
    protected static ?string $navigationLabel = 'Editör';
    protected static ?string $navigationIcon = 'heroicon-o-table-cells';

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
                ->modalWidth('md')
                ->modalHeading('Diyet Programını Paylaş')
                ->modalDescription('Bu diyet programını nasıl paylaşmak istiyorsunuz?')
                ->form(fn() => [
                    Select::make('share_method')
                        ->label('Paylaşım Yöntemi')
                        ->options([
                            'email' => 'E-posta ile Gönder',
                            'whatsapp' => 'WhatsApp ile Paylaş',
                            'pdf' => 'PDF İndir',
                        ])
                        ->required()
                        ->reactive()
                        ->native(false),

                    TextInput::make('email_recipient')
                        ->label('E-posta Adresi')
                        ->email()
                        ->required()
                        ->visible(fn(Get $get) => $get('share_method') === 'email')
                        ->default($this->dietProgram->client->email ?? null)
                        ->placeholder('ornek@email.com'),

                    TextInput::make('phone_recipient')
                        ->label('Telefon Numarası')
                        ->tel()
                        ->required()
                        ->visible(fn(Get $get) => $get('share_method') === 'whatsapp')
                        ->default($this->dietProgram->client->phone ?? null)
                        ->placeholder('905xxxxxxxxx')
                        ->helperText('Ülke kodu ile birlikte yazınız (örn: 905xxxxxxxxx)'),

                    Textarea::make('message')
                        ->label('Mesaj (Opsiyonel)')
                        ->visible(fn(Get $get) => $get('share_method') === 'whatsapp')
                        ->rows(3)
                        ->placeholder('Merhaba, diyet programınız hazır...'),
                ])
                ->action(fn(array $data) => $this->shareProgram($data))
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
        $recipient = $data['phone_recipient'] ?? $data[ 'email_recipient'] ?? '';
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
        try {
            SendDietProgramEmailJob::dispatch($this->dietProgram, $email, $this->table);


            $this->notify(
                '📧 E-posta gönderiliyor!',
                "Diyet programı {$email} adresine gönderilmek üzere kuyruğa alındı."
            );
        } catch (\Exception $e) {
            $this->notify(
                'Hata!',
                'E-posta gönderilemedi: ' . $e->getMessage(),
                'danger'
            );
        }
    }

    private function shareViaWhatsApp(string $phone, string $message): void
    {
        try {
            $phone = preg_replace('/[^0-9]/', '', $phone);

            $programName = $this->dietProgram->name;
            $patientName = $this->dietProgram->client->full_name ?? 'Danışan';

            $defaultMessage = "Merhaba {$patientName},\n\n";
            $defaultMessage .= "'{$programName}' isimli diyet programınız hazırlandı.\n\n";
            $defaultMessage .= "Detaylar için lütfen kliniği arayınız.\n\n";
            $defaultMessage .= "Sağlıklı günler dileriz!";

            $finalMessage = $message ?: $defaultMessage;
            $text = urlencode($finalMessage);
            $whatsappUrl = "https://wa.me/{$phone}?text={$text}";


                auth()?->user()?->notify(new DietProgramSharedNotification($this->dietProgram, 'whatsapp', $phone));

            $this->dispatch('openUrl', ['url' => $whatsappUrl]);

            $this->notify(
                '💚 WhatsApp paylaşımı hazır!',
                'WhatsApp uygulaması açılacak, mesajınızı gönderebilirsiniz.'
            );
        } catch (\Exception $e) {
            $this->notify(
                'Hata!',
                'WhatsApp paylaşımı başarısız: ' . $e->getMessage(),
                'danger'
            );
        }
    }

    private function downloadAsPdf(): void
    {
        $this->dietProgram->refresh();
        $this->loadTable();

        $pdf = Pdf::loadView('filament.resources.diet-program-resource.pages.diet-program-pdf', [
            'dietProgram' => $this->dietProgram,
            'tableData' => $this->table,
        ]);

        $client = Str::slug($this->dietProgram->client?->full_name);
        $timestamp = now()->format('Ymd_His');

        $fileName = $client.'_diyet_programi_'.$timestamp.'.pdf';
        $filePath = storage_path('app/public/' . $fileName);

        $pdf->save($filePath);

        $this->dispatch('openUrl', ['url' => asset('storage/' . $fileName) . '?t=' . time()]);
    }


}
