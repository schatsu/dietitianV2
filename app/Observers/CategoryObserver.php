<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        self::renumberOrder();
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        if ($category->isDirty('order')) {
            self::renumberOrder();
        }
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        self::renumberOrder();
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        //
    }

    public static function renumberOrder(): void
    {
        $allIds = Category::query()->orderBy('order')->pluck('id');

        foreach ($allIds as $index => $id) {
            Category::query()->where('id', $id)->update(['order' => $index + 1]);
        }
    }
}
