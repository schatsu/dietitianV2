<?php

namespace App\Observers;

use App\Models\Page;

class PageObserver
{
    /**
     * Handle the Page "created" event.
     */
    public function created(Page $page): void
    {
        self::renumberOrder();
    }

    /**
     * Handle the Page "updated" event.
     */
    public function updated(Page $page): void
    {
        if ($page->isDirty('order')) {
            self::renumberOrder();
        }
    }

    /**
     * Handle the Page "deleted" event.
     */
    public function deleted(Page $page): void
    {
        self::renumberOrder();
    }

    /**
     * Handle the Page "restored" event.
     */
    public function restored(Page $page): void
    {
        //
    }

    /**
     * Handle the Page "force deleted" event.
     */
    public function forceDeleted(Page $page): void
    {
        //
    }

    public static function renumberOrder(): void
    {
        $allIds = Page::query()->orderBy('order')->pluck('id');

        foreach ($allIds as $index => $id) {
            Page::query()->where('id', $id)->update(['order' => $index + 1]);
        }
    }
}
