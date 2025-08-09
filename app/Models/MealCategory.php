<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MealCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public function meals(): HasMany
    {
        return $this->hasMany(Meal::class);
    }
}
