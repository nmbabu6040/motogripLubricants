<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view(
            'admin.blogs.index',
            compact('blogs')
        );
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // slug part
        $slug = Str::slug($request->title);
        if (
            Blog::where('slug', $slug)->exists()
        ) {
            $slug .= '-' . time();
        }


        // image part
        $imageName = null;
        if ($request->hasFile('image')) {

            $imageName =
                time() .
                '.' .
                $request->image->extension();

            $request->image->storeAs(
                'blogs',
                $imageName,
                'public'
            );
        }

        // blog create part
        Blog::create([

            'title' => $request->title,

            'author_name' => $request->author_name,

            'published_at' => $request->published_at,

            'slug' => $slug,

            'image' => $imageName,

            'short_description' => $request->short_description,

            'content' => $request->content,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,

            'status' => $request->status ?? 1

        ]);

        return redirect()
            ->route('blogs.index')
            ->with(
                'success',
                'Blog Created Successfully'
            );
    }

    public function edit(Blog $blog)
    {
        return view(
            'admin.blogs.edit',
            compact('blog')
        );
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // slug part
        $slug = Str::slug($request->title);

        $exists = Blog::where(
            'slug',
            $slug
        )
            ->where(
                'id',
                '!=',
                $blog->id
            )
            ->exists();

        if ($exists) {

            $slug .= '-' . time();
        }

        // image part
        $imageName = $blog->image;
        if ($request->hasFile('image')) {

            if ($blog->image) {

                Storage::disk('public')
                    ->delete(
                        'blogs/' .
                            $blog->image
                    );
            }

            $imageName =
                time() .
                '.' .
                $request->image->extension();

            $request->image->storeAs(
                'blogs',
                $imageName,
                'public'
            );
        }

        // blog update
        $blog->update([

            'title' => $request->title,

            'author_name' => $request->author_name,

            'published_at' => $request->published_at,

            'slug' => $slug,

            'image' => $imageName,

            'short_description' => $request->short_description,

            'content' => $request->content,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,

            'status' => $request->status ?? 1

        ]);

        return redirect()
            ->route('blogs.index')
            ->with(
                'success',
                'Blog Updated Successfully'
            );
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {

            Storage::disk('public')
                ->delete(
                    'blogs/' .
                        $blog->image
                );
        }

        $blog->delete();

        return back()
            ->with(
                'success',
                'Blog Deleted Successfully'
            );
    }
}
