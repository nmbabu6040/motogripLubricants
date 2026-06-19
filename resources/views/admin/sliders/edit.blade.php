@extends('admin.layouts.app')

@section('content')
    <h3 class="mt-4">Edit Slider</h3>

    <form action="{{ route('sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Current Image</label>

            @if ($slider->image)
                <div class="mb-2">

                    <img src="{{ asset('storage/sliders/' . $slider->image) }}" width="200" class="img-thumbnail">

                </div>
            @endif

            <input type="file" name="image" class="form-control">

        </div>

        <div class="mb-3">

            <label>Title</label>

            <input type="text" name="title" class="form-control" value="{{ $slider->title }}">

        </div>

        <div class="mb-3">

            <label>Subtitle</label>

            <textarea name="subtitle" rows="4" class="form-control">{{ $slider->subtitle }}</textarea>

        </div>

        <div class="mb-3">

            <label>Button 1 Text</label>

            <input type="text" name="button_text_1" class="form-control" value="{{ $slider->button_text_1 }}">

        </div>

        <div class="mb-3">

            <label>Button 1 Link</label>

            <input type="text" name="button_link_1" class="form-control" value="{{ $slider->button_link_1 }}">

        </div>

        <div class="mb-3">

            <label>Button 2 Text</label>

            <input type="text" name="button_text_2" class="form-control" value="{{ $slider->button_text_2 }}">

        </div>

        <div class="mb-3">

            <label>Button 2 Link</label>

            <input type="text" name="button_link_2" class="form-control" value="{{ $slider->button_link_2 }}">

        </div>

        <div class="mb-3">

            <label>Sort Order</label>

            <input type="number" name="sort_order" class="form-control" value="{{ $slider->sort_order }}">

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>

        </div>

        <button class="btn btn-success">

            Update Slider

        </button>

        <a href="{{ route('sliders.index') }}" class="btn btn-secondary">

            Back

        </a>


    </form>
@endsection
