<?php

namespace App\Http\Controllers;

use App\Enums\BlogStatusEnum;
use App\Models\Blog;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    public function show(string $slug)
    {
        /** @var Tag $tag */
        $tag = Tag::query()
            ->select(['id', 'name', 'slug', 'order_column', 'type'])
            ->where('type', 'blog_tags')
            ->where('slug->'. app()?->getLocale(), $slug)
            ->firstOrFail();


        $blogs = Blog::query()
            ->withAnyTags([$tag], 'blog_tags')
            ->where('status', BlogStatusEnum::ACTIVE)
            ->with(['category', 'media'])
            ->orderBy('order')
            ->paginate(8);

        return view('front.tags.index', compact('blogs', 'tag'));
    }
}
