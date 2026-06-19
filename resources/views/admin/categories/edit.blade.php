@extends('admin.layouts.app')

@section('content')
    <h3 class="mt-4">Edit Category</h3>

    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-3">

            <label>Name</label>

            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>

        <div class="mb-3">

            <label>Image</label>
            @if ($category->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/categories/' . $category->image) }}" width="120" class="img-thumbnail">
                </div>
            @endif
            <input type="file" name="image" class="form-control">

        </div>

        <div class="mb-3">

            <label class="form-label">

                Sort Order

            </label>

            <input type="number" name="sort_order" class="form-control" value="{{ $category->sort_order }}">

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>
                    Inactive
                </option>


            </select>

        </div>

        <button class="btn btn-success">
            Save Category
        </button>

    </form>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
        Back
    </a>
@endsection
