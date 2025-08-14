<?php

namespace App\Observers;

use App\Models\Slider;
use Illuminate\Support\Facades\Cache;

class SliderObserver
{
    /**
     * Handle the Slider "created" event.
     */
    public function created(Slider $slider): void
    {
        self::renumberOrder();
        Cache::forget('active_sliders');
    }

    /**
     * Handle the Slider "updated" event.
     */
    public function updated(Slider $slider): void
    {
        if ($slider->isDirty('order')) {
            self::renumberOrder();
        }
        Cache::forget('active_sliders');
    }

    /**
     * Handle the Slider "deleted" event.
     */
    public function deleted(Slider $slider): void
    {
        self::renumberOrder();
        Cache::forget('active_sliders');
    }

    /**
     * Handle the Slider "restored" event.
     */
    public function restored(Slider $slider): void
    {
        //
    }

    /**
     * Handle the Slider "force deleted" event.
     */
    public function forceDeleted(Slider $slider): void
    {
        //
    }

    public static function renumberOrder(): void
    {
        $allIds = Slider::query()->orderBy('order')->pluck('id');

        foreach ($allIds as $index => $id) {
            Slider::query()->where('id', $id)->update(['order' => $index + 1]);
        }
    }
}
