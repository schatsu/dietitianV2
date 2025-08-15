<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class About extends Component
{
    public ?\App\Models\About $about;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->about = Cache::remember('about', 3600, function () {
            return \App\Models\About::query()
                ->select(['id', 'title', 'slug', 'content'])
                ->first();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about', [
            'about' => $this->about,
        ]);
    }
}
