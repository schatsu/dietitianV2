<?php

namespace App\Models;

use App\Enums\ClientStatusEnum;
use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Client extends Model
{
    use  HasSlug;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'slug',
        'phone', 'status', 'age', 'occupation', 'gender'
    ];

    protected function casts(): array
    {
        return [
            'gender' => GenderEnum::class,
            'status' => ClientStatusEnum::class,
            'age' => 'integer',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name'])
            ->saveSlugsTo('slug');
    }

    public function physicalProfile(): HasOne
    {
        return $this->hasOne(ClientPhysicalProfile::class);
    }
}
