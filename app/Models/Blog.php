<?php

namespace App\Models;

use App\Enums\BlogStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Blog extends Model
{
    use HasSlug;
    protected $fillable = [
        'title', 'slug', 'status', 'description', 'order', 'category_id', 'is_featured',
        'content', 'cover_image', 'seo_title', 'seo_description', 'seo_keywords',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
