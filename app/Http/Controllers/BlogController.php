<?php

namespace App\Http\Controllers;

use App\Enums\BlogStatusEnum;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::query()
            ->select([
                'id', 'title', 'slug', 'status', 'description', 'order', 'category_id', 'is_featured',
                'content', 'cover_image', 'seo_title', 'seo_description', 'seo_keywords', 'created_at'
            ])
            ->with('category')
            ->where('status', BlogStatusEnum::ACTIVE)
            ->orderBy('order')
            ->paginate(6);

        return view('front.blogs.index', compact('blogs'));
    }
}
