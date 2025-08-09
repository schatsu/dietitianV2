<?php

namespace App\Enums;

enum MealTimeEnum: string
{
    case BREAKFAST = 'breakfast';
    case LUNCH = 'lunch';
    case SNACK = 'snack';
    case DINNER = 'dinner';

    public function label(): string
    {
        return match($this) {
            self::BREAKFAST => 'Kahvaltı',
            self::LUNCH => 'Öğle Yemeği',
            self::SNACK => 'Ara Öğün',
            self::DINNER => 'Akşam Yemeği',
            default => 'Bilinmiyor',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [
            $case->value => $case->label(),
        ])->toArray();
    }
}
