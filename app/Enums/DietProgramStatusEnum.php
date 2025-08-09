<?php

namespace App\Enums;

enum DietProgramStatusEnum: string
{
    case ACTIVE = 'active';
    case PASSIVE = 'passive';

    public function isActive(): bool
    {
        return $this === self::ACTIVE;
    }

    public function isPassive(): bool
    {
        return $this === self::PASSIVE;
    }
}
