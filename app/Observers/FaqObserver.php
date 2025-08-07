<?php

namespace App\Observers;

use App\Models\Faq;

class FaqObserver
{
    /**
     * Handle the Faq "created" event.
     */
    public function created(Faq $faq): void
    {
        self::renumberOrder();
    }

    /**
     * Handle the Faq "updated" event.
     */
    public function updated(Faq $faq): void
    {
        if ($faq->isDirty('order')) {
            self::renumberOrder();
        }
    }

    /**
     * Handle the Faq "deleted" event.
     */
    public function deleted(Faq $faq): void
    {
        self::renumberOrder();
    }

    /**
     * Handle the Faq "restored" event.
     */
    public function restored(Faq $faq): void
    {
        //
    }

    /**
     * Handle the Faq "force deleted" event.
     */
    public function forceDeleted(Faq $faq): void
    {
        //
    }

    public static function renumberOrder(): void
    {
        $allIds = Faq::query()->orderBy('order')->pluck('id');

        foreach ($allIds as $index => $id) {
            Faq::query()->where('id', $id)->update(['order' => $index + 1]);
        }
    }
}
