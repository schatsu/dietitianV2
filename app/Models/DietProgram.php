<?php

namespace App\Models;

use App\Enums\DietProgramStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DietProgram extends Model
{
    protected $fillable = [
        'client_id', 'name', 'start_date', 'target_date', 'program_notes', 'status',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'target_date' => 'date',
            'status' => DietProgramStatusEnum::class,
        ];
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(DietProgramItem::class);
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            DietProgramStatusEnum::ACTIVE => 'success',
            DietProgramStatusEnum::PASSIVE => 'danger',
        };
    }

    public function getStatusTranslateNameAttribute(): string
    {
        return match ($this->status) {
            DietProgramStatusEnum::ACTIVE => 'Aktif',
            DietProgramStatusEnum::PASSIVE => 'Pasif',
        };
    }

    public function getStartDateFormattedAttribute()
    {
        return $this->start_date->format('d-m-Y');
    }

    public function getTargetDateFormattedAttribute()
    {
        return $this->target_date->format('d-m-Y');
    }
}
