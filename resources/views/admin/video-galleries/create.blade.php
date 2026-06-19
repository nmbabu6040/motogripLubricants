@extends('admin.layouts.app')

@section('content')
    <div class="card">


        <div class="card-header">

            <h4>

                Add New Video

            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('video-galleries.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Video Title

                    </label>

                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>

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
                        placeholder="https://www.youtube.com/watch?v=xxxxx" value="{{ old('youtube_url') }}" required>

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

                    <input type="number" name="sort_order" class="form-control" value="0">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Status

                    </label>

                    <select name="status" class="form-control">

                        <option value="1">

                            Active

                        </option>

                        <option value="0">

                            Inactive

                        </option>

                    </select>

                </div>

                <button type="submit" class="btn btn-primary">

                    Save Video

                </button>

                <a href="{{ route('video-galleries.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>


    </div>
@endsection
