@extends('admin.layouts.app')

@section('content')
    <div class="card">


        <div class="card-header">

            <h4>

                Edit Video

            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('video-galleries.update', $video_gallery->id) }}" method="POST">

                @csrf

                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">

                        Video Title

                    </label>

                    <input type="text" name="title" class="form-control" value="{{ old('title', $video_gallery->title) }}"
                        required>

                    @error('title')
                        <small class="text-danger">

                            {{ $message }}

                        </small>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        YouTube URL

                    </label>

                    <input type="text" name="youtube_url" class="form-control"
                        value="{{ old('youtube_url', $video_gallery->youtube_url) }}" required>

                    @error('youtube_url')
                        <small class="text-danger">

                            {{ $message }}

                        </small>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Sort Order

                    </label>

                    <input type="number" name="sort_order" class="form-control"
                        value="{{ old('sort_order', $video_gallery->sort_order) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Status

                    </label>

                    <select name="status" class="form-control">

                        <option value="1" {{ $video_gallery->status == 1 ? 'selected' : '' }}>

                            Active

                        </option>

                        <option value="0" {{ $video_gallery->status == 0 ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>

                <button type="submit" class="btn btn-primary">

                    Update Video

                </button>

                <a href="{{ route('video-galleries.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>


    </div>
@endsection
