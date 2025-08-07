<?php

namespace App\Enums;

enum BlogStatusEnum: string
{
    case ACTIVE = 'active';
    case PASSIVE = 'passive';
    case DRAFT = 'draft';

    public function isActive(): bool
    {
        return $this === self::ACTIVE;
    }

    public function isPassive(): bool
    {
        return $this === self::PASSIVE;
    }
    public function isDraft(): bool
    {
        return $this === self::DRAFT;
    }

    public function label(): string
    {
        return match($this) {
            self::ACTIVE => 'Aktif',
            self::PASSIVE => 'Pasif',
            self::DRAFT => 'Taslak',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::ACTIVE => 'success',
            self::PASSIVE => 'danger',
            self::DRAFT => 'gray',
        };
    }
}
