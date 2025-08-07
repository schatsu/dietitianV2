<?php

namespace App\Enums;

enum ClientStatusEnum: string
{
    case ACTIVE = 'active';
    case PASSIVE = 'passive';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Aktif',
            self::PASSIVE => 'Pasif',
        };
    }

    public static function labels(): array
    {
        return [
            self::ACTIVE->value => self::ACTIVE->label(),
            self::PASSIVE->value => self::PASSIVE->label(),
        ];
    }

    public function color(): string
    {
        return match($this) {
            self::ACTIVE => 'success',
            self::PASSIVE => 'danger',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [
            $case->value => $case->label()
        ])->toArray();
    }
}
