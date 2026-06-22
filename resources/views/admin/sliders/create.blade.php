@extends('admin.layouts.app')

@section('content')
    <h3 class="mt-4">Add Slider</h3>

    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">

        @csrf


        <div class="mb-3">

            <label>Slider Title</label>
            <input type="text" name="title" class="form-control">

        </div>

        <div class="mb-3">

            <label>Slider Sub-Title</label>
            <input type="text" name="sub_title" class="form-control">

        </div>

        <div class="mb-3">

            <label>Image</label>

            <input type="file" name="image" class="form-control">

            @error('image')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label>Button 1 Link</label>
            <input type="text" name="button_link_1" class="form-control">
        </div>

        <div class="mb-3">

            <label>Button 1 Text</label>
            <input type="text" name="button_text_1" class="form-control">
        </div>

        <div class="mb-3">

            <label>Button 2 Link</label>
            <input type="text" name="button_link_2" class="form-control">
        </div>

        <div class="mb-3">

            <label>Button 2 Text</label>
            <input type="text" name="button_text_2" class="form-control">
        </div>

        <div class="mb-3">

            <label>Short Description</label>

            <textarea name="short_description" class="form-control"></textarea>

        </div>

        <div class="mb-3">

            <label>Sort Order</label>

            <input type="number" name="sort_order" class="form-control">
        </div>


        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="1">Active</option>
                <option value="0">Inactive</option>

            </select>

        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-success">
                Save Slider
            </button>

            <a href="{{ route('sliders.index') }}" class="btn btn-danger">
                Back
            </a>
        </div>

    </form>
@endsection
