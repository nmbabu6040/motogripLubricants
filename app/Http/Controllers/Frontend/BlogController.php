<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where(
            'status',
            1
        )
            ->latest()
            ->paginate(9);

        return view(
            'frontend.blogs',
            compact('blogs')
        );
    }

    public function details($slug)
    {
        $blog = Blog::where(
            'slug',
            $slug
        )
            ->where(
                'status',
                1
            )
            ->firstOrFail();

        $recentBlogs = Blog::where(
            'status',
            1
        )
            ->where(
                'id',
                '!=',
                $blog->id
            )
            ->latest()
            ->take(5)
            ->get();

        return view(
            'frontend.blog-details',
            compact(
                'blog',
                'recentBlogs'
            )
        );
    }
}
