<?php

namespace App\Enums;

enum ProgramDayEnum: string
{
    case MONDAY = 'monday';
    case TUESDAY = 'tuesday';
    case WEDNESDAY = 'wednesday';
    case THURSDAY = 'thursday';
    case FRIDAY = 'friday';
    case SATURDAY = 'saturday';
    case SUNDAY = 'sunday';

    public function label(): string
    {
        return match($this) {
            self::MONDAY => 'Pazartesi',
            self::TUESDAY => 'Salı',
            self::WEDNESDAY => 'Çarşamba',
            self::THURSDAY => 'Perşembe',
            self::FRIDAY => 'Cuma',
            self::SATURDAY => 'Cumartesi',
            self::SUNDAY => 'Pazar',
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
