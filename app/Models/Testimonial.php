<?php

namespace App\Models;

use App\Observers\TestimonialObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
#[ObservedBy(TestimonialObserver::class)]
class Testimonial extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    protected $fillable = [
        'client_name', 'review', 'rating', 'order', 'status'
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'rating' => 'integer',
            'status' => 'boolean'
        ];
    }
}
