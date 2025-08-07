<?php

namespace App\Models;

use App\Observers\ServiceObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[ObservedBy(ServiceObserver::class)]
class Service extends Model
{
    use HasSlug;
    protected $fillable = [
        'name', 'slug', 'status', 'description', 'order',
        'image', 'seo_title', 'seo_description', 'seo_keywords',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(fn($model) => $model?->slug ?? $model?->name ?? '')
            ->saveSlugsTo('slug');
    }

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'status' => 'boolean',
        ];
    }
}
