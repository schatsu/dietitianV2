<?php

namespace App\Models;


use App\Observers\PageObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[ObservedBy(PageObserver::class)]
class Page extends Model implements Sortable
{
    use SortableTrait, HasSlug;
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    protected $fillable = [
        'title', 'slug', 'content', 'order', 'status',
        'seo_title', 'seo_description', 'seo_keywords'
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
            'status' => 'boolean',
            'order' => 'integer',
        ];
    }
}
