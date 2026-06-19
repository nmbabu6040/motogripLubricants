@extends('admin.layouts.app')

@section('content')

    <div class="card">


        <div class="card-header">

            <h4>

                Edit Gallery Image

            </h4>

        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">

                        Title

                    </label>

                    <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Current Image

                    </label>

                    <br>

                    <img src="{{ asset('storage/gallery/' . $gallery->image) }}" width="150" class="img-thumbnail">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        New Image

                    </label>

                    <input type="file" name="image" class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Sort Order

                    </label>

                    <input type="number" name="sort_order" class="form-control"
                        value="{{ old('sort_order', $gallery->sort_order) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Status

                    </label>

                    <select name="status" class="form-control">

                        <option value="1" {{ $gallery->status == 1 ? 'selected' : '' }}>

                            Active

                        </option>

                        <option value="0" {{ $gallery->status == 0 ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>

                <button class="btn btn-primary">

                    Update Image

                </button>

                <a href="{{ route('galleries.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>


    </div>

@endsection
