<?php

namespace App\Enums;

enum GoalTypeEnum: string
{
    case WEIGHT_LOSS = 'weight_loss';
    case WEIGHT_GAIN = 'weight_gain';
    case WEIGHT_MAINTENANCE = 'weight_maintenance';
    case MUSCLE_GAIN = 'muscle_gain';
    case HEALTHY_NUTRITION = 'healthy_nutrition';
    case BODY_SHAPING = 'body_shaping';

    public function label(): string
    {
        return match($this) {
            self::WEIGHT_LOSS => 'Kilo Verme',
            self::WEIGHT_GAIN => 'Kilo Alma',
            self::WEIGHT_MAINTENANCE => 'Kilo Koruma',
            self::MUSCLE_GAIN => 'Kas Kazanma',
            self::HEALTHY_NUTRITION => 'Sağlıklı Beslenme',
            self::BODY_SHAPING => 'Vücut Şekillendirme',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [
            $case->value => $case->label()
        ])->toArray();
    }
}
