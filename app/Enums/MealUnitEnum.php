<?php

namespace App\Enums;

enum MealUnitEnum: string
{
    case GRAM = 'gram';
    case PIECE = 'piece';
    case SLICE = 'slice';
    case PORTION = 'portion';
    case SPOON = 'spoon';


    public function label(): string
    {
        return match ($this) {
            self::GRAM => 'Gram',
            self::PIECE => 'Adet',
            self::SLICE => 'Dilim',
            self::PORTION => 'Porsiyon',
            self::SPOON => 'Kaşık',
            default => 'Bilinmiyor',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [
            $case->value => $case->label(),
        ])->toArray();
    }

    public function isGram(): bool
    {
        return $this === self::GRAM;
    }

    public function isPiece(): bool
    {
        return $this === self::PIECE;
    }

    public function isSlice(): bool
    {
        return $this === self::SLICE;
    }

    public function isPortion(): bool
    {
        return $this === self::PORTION;
    }

    public function isSpoon(): bool
    {
        return $this === self::SPOON;
    }
}
