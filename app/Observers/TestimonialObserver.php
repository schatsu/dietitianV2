<?php

namespace App\Observers;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;

class TestimonialObserver
{
    /**
     * Handle the Testimonial "created" event.
     */
    public function created(Testimonial $testimonial): void
    {
        self::renumberOrder();
        Cache::forget('testimonial');
    }

    /**
     * Handle the Testimonial "updated" event.
     */
    public function updated(Testimonial $testimonial): void
    {
        if ($testimonial->isDirty('order')) {
            self::renumberOrder();
        }
        Cache::forget('testimonial');
    }

    /**
     * Handle the Testimonial "deleted" event.
     */
    public function deleted(Testimonial $testimonial): void
    {
        self::renumberOrder();
        Cache::forget('testimonial');
    }

    /**
     * Handle the Testimonial "restored" event.
     */
    public function restored(Testimonial $testimonial): void
    {
        //
    }

    /**
     * Handle the Testimonial "force deleted" event.
     */
    public function forceDeleted(Testimonial $testimonial): void
    {
        //
    }

    public static function renumberOrder(): void
    {
        $allIds = Testimonial::query()->orderBy('order')->pluck('id');

        foreach ($allIds as $index => $id) {
            Testimonial::query()->where('id', $id)->update(['order' => $index + 1]);
        }
    }
}
