<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceObserver
{
    /**
     * Handle the Service "created" event.
     */
    public function created(Service $service): void
    {
        self::renumberOrder();
        Cache::forget('active_services');
    }

    /**
     * Handle the Service "updated" event.
     */
    public function updated(Service $service): void
    {
        if ($service->isDirty('order')) {
            self::renumberOrder();
        }
        Cache::forget('active_services');

    }

    /**
     * Handle the Service "deleted" event.
     */
    public function deleted(Service $service): void
    {
        self::renumberOrder();
        Cache::forget('active_services');
    }

    /**
     * Handle the Service "restored" event.
     */
    public function restored(Service $service): void
    {
        //
    }

    /**
     * Handle the Service "force deleted" event.
     */
    public function forceDeleted(Service $service): void
    {
        //
    }

    public static function renumberOrder(): void
    {
        $allIds = Service::query()->orderBy('order')->pluck('id');

        foreach ($allIds as $index => $id) {
            Service::query()->where('id', $id)->update(['order' => $index + 1]);
        }
    }
}
