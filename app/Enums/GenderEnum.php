<?php

namespace App\Enums;

enum GenderEnum: string
{
    case MALE = 'male';
    case FEMALE = 'female';

    public function label(): string
    {
        return match ($this) {
            self::MALE => 'Kadın',
            self::FEMALE => 'Erkek',
        };
    }

    public static function labels(): array
    {
        return [
            self::MALE->value => self::MALE->label(),
            self::FEMALE->value => self::FEMALE->label(),
        ];
    }

    public function color(): string
    {
        return match($this) {
            self::MALE => 'success',
            self::FEMALE => 'warning',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [
            $case->value => $case->label()
        ])->toArray();
    }
}
