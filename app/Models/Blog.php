<?php

namespace App\Models;

use App\Enums\BlogStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class Blog extends Model implements HasMedia
{

    use HasSlug, InteractsWithMedia, HasTags;
    protected $fillable = [
        'title', 'slug', 'status', 'description', 'order', 'category_id', 'is_featured',
        'content', 'seo_title', 'seo_description',
    ];

    protected function casts(): array
    {
        return [
            'status' => BlogStatusEnum::class,
            'order' => 'integer',
            'is_featured' => 'boolean',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(fn($model) => $model?->slug ?? $model?->title ?? '')
            ->saveSlugsTo('slug');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('cover_image')
            ->fit(Fit::Crop, 600, 430)
            ->format('webp')
            ->nonQueued();

        $this->addMediaConversion('og_image')
            ->fit(Fit::Crop, 1200, 630)
            ->format('webp')
            ->nonQueued();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
