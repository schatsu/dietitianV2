<?php

namespace App\Models;

use App\Observers\SliderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\SlugOptions;

#[ObservedBy(SliderObserver::class)]
class Slider extends Model implements Sortable, HasMedia
{
    use SortableTrait, HasHashid, InteractsWithMedia;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    protected $fillable = [
        'title', 'slug', 'description', 'link', 'order', 'is_active'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(fn($model) => $model?->slug ?? $model?->title ?? '')
            ->saveSlugsTo('slug');
    }

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'is_active' => 'boolean'
        ];
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('slider')
            ->fit(Fit::Crop, 1920, 1080)
            ->format('webp')
            ->withResponsiveImages()
            ->nonQueued();
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return 'https://placehold.co/1920x1200';
    }
}
