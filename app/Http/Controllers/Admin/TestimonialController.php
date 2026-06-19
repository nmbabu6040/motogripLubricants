<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view(
            'admin.testimonials.index',
            compact('testimonials')
        );
    }

    public function create()
    {
        return view(
            'admin.testimonials.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',

            'message' => 'required',

            'image' => 'nullable|image'

        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName =
                time() .
                '.' .
                $request->image->extension();

            $request->image->storeAs(
                'testimonials',
                $imageName,
                'public'
            );
        }

        Testimonial::create([

            'name' => $request->name,

            'designation' => $request->designation,

            'image' => $imageName,

            'message' => $request->message,

            'rating' => $request->rating ?? 5,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status ?? 1

        ]);

        return redirect()
            ->route('testimonials.index')
            ->with(
                'success',
                'Testimonial Created Successfully'
            );
    }

    public function edit(Testimonial $testimonial)
    {
        return view(
            'admin.testimonials.edit',
            compact('testimonial')
        );
    }

    public function update(
        Request $request,
        Testimonial $testimonial
    ) {
        $request->validate([

            'name' => 'required|max:255',

            'message' => 'required',

            'image' => 'nullable|image'

        ]);

        $imageName = $testimonial->image;

        if ($request->hasFile('image')) {

            if ($testimonial->image) {

                Storage::disk('public')
                    ->delete(
                        'testimonials/' .
                            $testimonial->image
                    );
            }

            $imageName =
                time() .
                '.' .
                $request->image->extension();

            $request->image->storeAs(
                'testimonials',
                $imageName,
                'public'
            );
        }

        $testimonial->update([

            'name' => $request->name,

            'designation' => $request->designation,

            'image' => $imageName,

            'message' => $request->message,

            'rating' => $request->rating ?? 5,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status ?? 1

        ]);

        return redirect()
            ->route('testimonials.index')
            ->with(
                'success',
                'Testimonial Updated Successfully'
            );
    }

    public function destroy(
        Testimonial $testimonial
    ) {
        if ($testimonial->image) {

            Storage::disk('public')
                ->delete(
                    'testimonials/' .
                        $testimonial->image
                );
        }

        $testimonial->delete();

        return back()
            ->with(
                'success',
                'Testimonial Deleted Successfully'
            );
    }
}
