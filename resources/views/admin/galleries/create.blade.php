@extends('admin.layouts.app')

@section('content')

    <div class="card">


        <div class="card-header">

            <h4>

                Add Gallery Image

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

            <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Title

                    </label>

                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Gallery Image

                    </label>

                    <input type="file" name="image" class="form-control" required>

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

                <button class="btn btn-primary">

                    Save Image

                </button>

                <a href="{{ route('galleries.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>


    </div>

@endsection
