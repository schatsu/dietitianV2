<?php

namespace App\Models;


use App\Observers\FaqObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

#[ObservedBy(FaqObserver::class)]
class Faq extends Model implements Sortable
{
    use SortableTrait;
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    protected $fillable = [
        'question',
        'answer',
        'order',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'status' => 'boolean',
        ];
    }
}
