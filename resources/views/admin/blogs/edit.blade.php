@extends('admin.layouts.app')

@section('content')
    <h3 class="mt-4">Edit Blog</h3>

    <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Title</label>

            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}">

            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">

                Author Name

            </label>

            <input type="text" name="author_name" class="form-control" value="{{ $blog->author_name }}">

        </div>

        <div class="mb-3">

            <label class="form-label">

                Publish Date

            </label>

            <input type="date" name="published_at" class="form-control" value="{{ $blog->published_at }}">

        </div>

        <div class="mb-3">

            <label>Current Image</label>

            @if ($blog->image)
                <div class="mb-2">

                    <img src="{{ asset('storage/blogs/' . $blog->image) }}" width="150" class="img-thumbnail">

                </div>
            @endif

            <input type="file" name="image" class="form-control">

            <small class="text-muted">
                Leave empty to keep current image.
            </small>

        </div>

        <div class="mb-3">

            <label>Short Description</label>

            <textarea name="short_description" rows="3" class="form-control">{{ old('short_description', $blog->short_description) }}</textarea>

        </div>

        <div class="mb-3">

            <label>Content</label>

            <textarea name="content" rows="10" class="form-control">{{ old('content', $blog->content) }}</textarea>

            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>

        <hr>

        <h5>SEO Information</h5>

        <div class="mb-3">

            <label>Meta Title</label>

            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $blog->meta_title) }}">

        </div>

        <div class="mb-3">

            <label>Meta Description</label>

            <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description', $blog->meta_description) }}</textarea>

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>

        </div>

        <button class="btn btn-success">

            Update Blog

        </button>

        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">

            Back

        </a>


    </form>
@endsection
