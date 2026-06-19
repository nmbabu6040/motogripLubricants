<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view(
            'admin.galleries.index',
            compact('galleries')
        );
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName =
                time() .
                '.' .
                $request->image->extension();

            $request->image->storeAs(
                'gallery',
                $imageName,
                'public'
            );
        }

        Gallery::create([

            'title' => $request->title,

            'image' => $imageName,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status ?? 1

        ]);

        return redirect()
            ->route('galleries.index')
            ->with(
                'success',
                'Gallery Image Added Successfully'
            );
    }

    public function edit(Gallery $gallery)
    {
        return view(
            'admin.galleries.edit',
            compact('gallery')
        );
    }

    public function update(
        Request $request,
        Gallery $gallery
    ) {
        $request->validate([

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $imageName = $gallery->image;

        if ($request->hasFile('image')) {

            if ($gallery->image) {

                Storage::disk('public')
                    ->delete(
                        'gallery/' .
                            $gallery->image
                    );
            }

            $imageName =
                time() .
                '.' .
                $request->image->extension();

            $request->image->storeAs(
                'gallery',
                $imageName,
                'public'
            );
        }

        $gallery->update([

            'title' => $request->title,

            'image' => $imageName,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status ?? 1

        ]);

        return redirect()
            ->route('galleries.index')
            ->with(
                'success',
                'Gallery Updated Successfully'
            );
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {

            Storage::disk('public')
                ->delete(
                    'gallery/' .
                        $gallery->image
                );
        }

        $gallery->delete();

        return back()
            ->with(
                'success',
                'Gallery Deleted Successfully'
            );
    }
}
