<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view(
            'admin.sliders.index',
            compact('sliders')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072'

        ], [
            'image.required' => 'Product image is required.',
            'image.image' => 'Please upload a valid image.',
            'image.mimes' => 'Only JPG, JPEG, PNG and WEBP files are allowed.',
            'image.max' => 'Image size must not exceed 3 MB.',
        ]);

        // image start
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs(
                'sliders',
                $imageName,
                'public'
            );
        }

        Slider::create([

            'title' => $request->title,

            'subtitle' => $request->subtitle,

            'image' => $imageName,

            'button_text_1' => $request->button_text_1,

            'button_link_1' => $request->button_link_1,

            'button_text_2' => $request->button_text_2,

            'button_link_2' => $request->button_link_2,

            'sort_order' => $request->sort_order,

            'status' => $request->status

        ]);

        return redirect()
            ->route('sliders.index')
            ->with(
                'success',
                'Slider Added Successfully'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view(
            'admin.sliders.edit',
            compact('slider')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {

        $request->validate([

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072'

        ], [
            'image.required' => 'Product image is required.',
            'image.image' => 'Please upload a valid image.',
            'image.mimes' => 'Only JPG, JPEG, PNG and WEBP files are allowed.',
            'image.max' => 'Image size must not exceed 3 MB.',
        ]);

        //    image update part
        if ($request->hasFile('image')) {

            if ($slider->image) {

                Storage::disk('public')->delete(
                    'sliders/' . $slider->image
                );
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->storeAs(
                'sliders',
                $imageName,
                'public'
            );

            $slider->image = $imageName;
        }

        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button_text_1 = $request->button_text_1;
        $slider->button_link_1 = $request->button_link_1;
        $slider->button_text_2 = $request->button_text_2;
        $slider->button_link_2 = $request->button_link_2;
        $slider->sort_order = $request->sort_order;
        $slider->status = $request->status;

        $slider->save();

        return redirect()
            ->route('sliders.index')
            ->with(
                'success',
                'Slider Updated Successfully'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image) {

            Storage::disk('public')->delete(
                'sliders/' . $slider->image
            );
        }

        $slider->delete();

        return redirect()
            ->route('sliders.index')
            ->with(
                'success',
                'Slider Deleted Successfully'
            );
    }
}
