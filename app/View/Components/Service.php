<?php

namespace App\View\Components;

use App\Enums\ServiceStatusEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Service extends Component
{
    /**
     * Create a new component instance.
     */
    public Collection $services;

    public function __construct()
    {
        $this->services = Cache::remember('active_services', 3600, function () {
            return \App\Models\Service::query()
                ->select([
                    'id','name', 'slug', 'status', 'description', 'order',
                    'image', 'seo_title', 'seo_description', 'seo_keywords',
                ])
                ->where('status', true)
                ->orderBy('order')
                ->get();

        }) ?? collect();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.service', [
            'services' => $this->services,
        ]);
    }
}
