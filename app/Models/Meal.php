<?php

namespace App\Models;

use App\Enums\MealUnitEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meal extends Model
{
    protected $fillable = [
        'name',
        'meal_category_id',
        'default_quantity',
        'unit',
    ];

    protected function casts(): array
    {
        return [
            'unit' => MealUnitEnum::class,
            'default_quantity' => 'integer',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(MealCategory::class, 'meal_category_id');
    }

    protected function nameWithQuantity(): Attribute
    {
        return Attribute::get(function () {
            $quantity = $this->default_quantity ?? '';
            $unit = $this->unit?->label() ?? '';

            $details = trim("{$quantity} {$unit}");

            return $details !== ''
                ? "{$this->name} ({$details})"
                : $this->name;
        });
    }
}
