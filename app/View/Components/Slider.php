<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Slider extends Component
{
    public Collection $sliders;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->sliders = Cache::remember('active_sliders', 3600, function () {
            return \App\Models\Slider::query()
                ->select(['id', 'title', 'slug', 'description', 'image', 'link', 'order', 'is_active'])
                ->where('is_active', true)
                ->orderBy('order')
                ->get();
        }) ?? collect();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider', [
            'sliders' => $this->sliders,
        ]);
    }
}
