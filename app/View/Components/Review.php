<?php

namespace App\View\Components;

use App\Enums\ReviewStatusEnum;
use App\Models\Testimonial;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Review extends Component
{
    /**
     * Create a new component instance.
     */
    public Collection $reviews;

    public function __construct()
    {
        $this->reviews = Cache::remember('testimonial', 3600, function () {
            return Testimonial::query()
                ->select([
                    'id', 'client_name', 'review', 'rating', 'order', 'status', 'created_at'
                ])
                ->where('status', true)
                ->orderBy('order')
                ->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review', [
            'reviews' => $this->reviews,
        ]);
    }
}
