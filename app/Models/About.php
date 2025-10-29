<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class About extends Model implements HasMedia
{
    use HasSlug, InteractsWithMedia;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(fn($model) => $model?->slug ?? $model?->title ?? '')
            ->saveSlugsTo('slug');
    }

    public $timestamps = false;

    protected $fillable = [
        'title', 'slug', 'content', 'highlights'
    ];

    protected function casts(): array
    {
        return [
            'highlights' => 'array',
        ];
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('about')
            ->fit(Fit::Crop, 1000, 751)
            ->format('webp')
            ->performOnCollections('about')
            ->withResponsiveImages()
            ->nonQueued();
    }

    public function getMediumAboutAttribute(): string
    {
        return Str::limit($this->content, 310);
    }
}
