<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class About extends Model
{
    use HasSlug;

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
        'title','slug', 'content'
    ];

    public function getMediumAboutAttribute(): string
    {
        return Str::limit($this->content, 310);
    }
}
