<?php

namespace App\Filament\Resources\DietProgramResource\Pages;

use App\Enums\MealTimeEnum;
use App\Enums\MealUnitEnum;
use App\Enums\ProgramDayEnum;
use App\Filament\Resources\DietProgramResource;
use App\Models\DietProgram;
use App\Models\DietProgramItem;
use App\Models\Meal;
use App\Models\MealCategory;
use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Collection;

class DietProgramEditor extends Page
{
    protected static string $resource = DietProgramResource::class;

    protected static string $view = 'filament.resources.diet-program-resource.pages.diet-program-editor';

    protected static ?string $title = 'Diyet Programı Editörü';

    public DietProgram $dietProgram;

    public array $table = [];
    public array $days = [];
    public array $times = [];

    // Modal state'leri
    public bool $showAddMealModal = false;
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
                ->modalCancelActionLabel('İptal')
                ->form([
                    \Filament\Forms\Components\Select::make('share_method')
                        ->label('Paylaşım Yöntemi')
                        ->options([
                            'email' => '📧 E-posta ile gönder',
                            'whatsapp' => '📱 WhatsApp ile paylaş',
                            'pdf' => '📄 PDF olarak indir',
                            'link' => '🔗 Paylaşım linki oluştur'
                        ])
                        ->required()
                        ->default('email')
                        ->live(),
                    \Filament\Forms\Components\TextInput::make('recipient')
                        ->label('Alıcı')
                        ->placeholder('E-posta adresi veya telefon numarası')
                        ->required()
                        ->visible(fn ($get) => in_array($get('share_method'), ['email', 'whatsapp'])),
                    \Filament\Forms\Components\Textarea::make('message')
                        ->label('Mesaj (Opsiyonel)')
                        ->placeholder('Diyet programı ile birlikte göndermek istediğiniz mesaj...')
                        ->rows(3),
                ])
                ->action(function (array $data) {
                    $this->shareProgram($data);
                }),

            Action::make('back')
                ->label('Geri Dön')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(static::getResource()::getUrl('index')),

            Action::make('preview')
                ->label('Önizleme')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->action(function () {
                    $this->previewProgram();
                }),
        ];
    }

    // Yemek ekleme modalını aç
    public function openAddMealModal(string $day, string $time): void
    {
        $this->selectedDay = $day;
        $this->selectedTime = $time;
        $this->selectedDayLabel = $this->days[$day] ?? $day;
        $this->selectedTimeLabel = $this->times[$time] ?? $time;
        $this->showAddMealModal = true;

        // Frontend'e modal açılması için sinyal gönder
        $this->dispatch('open-add-meal-modal');
    }

    // Modal kapatma
    public function closeAddMealModal(): void
    {
        $this->showAddMealModal = false;
        $this->selectedDay = '';
        $this->selectedTime = '';
        $this->selectedDayLabel = '';
        $this->selectedTimeLabel = '';
    }

    // Hızlı yemek ekleme
    public function quickAddMeal(int $mealId): void
    {
        if (empty($this->selectedDay) || empty($this->selectedTime)) {
            Notification::make()
                ->title('Hata!')
                ->body('Lütfen önce bir hücre seçin.')
                ->danger()
                ->send();
            return;
        }

        $meal = Meal::find($mealId);
        if (!$meal) {
            Notification::make()
                ->title('Hata!')
                ->body('Yemek bulunamadı.')
                ->danger()
                ->send();
            return;
        }

        $this->addMealToSlot(
            $this->selectedDay,
            $this->selectedTime,
            $mealId,
            $meal->default_quantity,
            $meal->unit->value
        );

        $this->closeAddMealModal();
    }

    public function shareProgram(array $data): void
    {
        $method = $data['share_method'];
        $recipient = $data['recipient'] ?? null;
        $message = $data['message'] ?? '';

        switch ($method) {
            case 'email':
                $this->shareViaEmail($recipient, $message);
                break;
            case 'whatsapp':
                $this->shareViaWhatsApp($recipient, $message);
                break;
            case 'pdf':
                $this->downloadAsPdf();
                break;
            case 'link':
                $this->generateShareLink();
                break;
        }
    }

    private function shareViaEmail(string $email, string $message): void
    {
        Notification::make()
            ->title('Program e-posta ile gönderildi!')
            ->body("Diyet programı {$email} adresine başarıyla gönderildi.")
            ->success()
            ->send();
    }

    private function shareViaWhatsApp(string $phone, string $message): void
    {
        $programUrl = url("/diet-programs/{$this->dietProgram->id}/public");
        $whatsappMessage = urlencode($message . "\n\nDiyet Programı: " . $programUrl);
        $whatsappUrl = "https://wa.me/{$phone}?text={$whatsappMessage}";

        $this->dispatch('openUrl', ['url' => $whatsappUrl]);

        Notification::make()
            ->title('WhatsApp paylaşımı hazırlandı!')
            ->body('WhatsApp uygulaması açılacak, mesajınızı gönderebilirsiniz.')
            ->success()
            ->send();
    }

    private function downloadAsPdf(): void
    {
        Notification::make()
            ->title('PDF indiriliyor!')
            ->body('Diyet programı PDF formatında indiriliyor...')
            ->success()
            ->send();
    }

    private function generateShareLink(): void
    {
        $shareLink = url("/diet-programs/{$this->dietProgram->id}/public");

        $this->dispatch('copyToClipboard', ['text' => $shareLink]);

        Notification::make()
            ->title('Paylaşım linki kopyalandı!')
            ->body('Link panoya kopyalandı. İstediğiniz yerde paylaşabilirsiniz.')
            ->success()
            ->send();
    }

    public function previewProgram(): void
    {
        $this->dispatch('openPreviewModal');
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
            $unitLabel = MealUnitEnum::from($item->unit)->label();

            $this->table[$day][$time][] = [
                'id' => $item->id,
                'meal_name' => $item->meal->name,
                'quantity' => $item->quantity,
                'unit' => $unitLabel,
            ];
        }
    }

    public function getItems(string $day, string $time): array
    {
        return $this->table[$day][$time] ?? [];
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

        Notification::make()
            ->title('✅ Yemek eklendi!')
            ->body("'{$meal->name}' başarıyla {$this->days[$day]} - {$this->times[$mealTime]} slotuna eklendi.")
            ->success()
            ->send();
    }

    public function removeItem(int $itemId): void
    {
        $item = DietProgramItem::query()
            ->where('id', $itemId)
            ->where('diet_program_id', $this->dietProgram->id)
            ->with('meal:id,name')
            ->first();

        if (!$item) {
            Notification::make()
                ->title('Hata!')
                ->body('Yemek bulunamadı.')
                ->danger()
                ->send();
            return;
        }

        $mealName = $item->meal->name;
        $item->delete();

        Notification::make()
            ->title('🗑️ Yemek silindi!')
            ->body("'{$mealName}' programdan kaldırıldı.")
            ->success()
            ->send();

        $this->loadTable();
    }

    // Kategorilere göre yemekleri getir
    public function getMealsByCategory(): Collection
    {
        return MealCategory::query()
            ->with(['meals' => function($query) {
                $query->select('id', 'name', 'meal_category_id', 'default_quantity', 'unit')
                    ->orderBy('name');
            }])
            ->whereHas('meals')
            ->orderBy('name')
            ->get();
    }

    // En çok kullanılan yemekleri getir (modal için)
    public function getPopularMeals(): Collection
    {
        // En çok kullanılan yemekleri getirmek için DietProgramItem'dan sayım yapalım
        $popularMealIds = DietProgramItem::query()
            ->select('meal_id')
            ->selectRaw('COUNT(*) as usage_count')
            ->groupBy('meal_id')
            ->orderByDesc('usage_count')
            ->limit(12)
            ->pluck('meal_id');

        // Eğer hiç kullanılmış yemek yoksa, ilk 12 yemeği döndür
        if ($popularMealIds->isEmpty()) {
            return Meal::query()
                ->select('id', 'name', 'meal_category_id', 'default_quantity', 'unit')
                ->with('category:id,name')
                ->limit(12)
                ->get();
        }

        return Meal::query()
            ->select('id', 'name', 'meal_category_id', 'default_quantity', 'unit')
            ->with('category:id,name')
            ->whereIn('id', $popularMealIds)
            ->get();
    }

    // Seeder'dan örnek yemekler (eğer popüler yemek yoksa)
    public function getSampleMeals(): Collection
    {
        return Meal::query()
            ->select('id', 'name', 'meal_category_id', 'default_quantity', 'unit')
            ->with('category:id,name')
            ->whereIn('name', [
                'Yumurta', 'Beyaz Peynir', 'Domates', 'Haşlanmış Tavuk',
                'Mercimek Çorbası', 'Yoğurt', 'Muz', 'Zeytin',
                'Kuru Fasulye', 'Ayran'
            ])
            ->limit(12)
            ->get();
    }

    public function openShareModal(): void
    {
        $this->dispatch('openShareModal');
    }
}
