@extends('admin.layouts.app')

@section('content')
    <h3 class="mt-4">Add Sub Category</h3>

    <form action="{{ route('sub-categories.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>Category</label>

            <select name="category_id" class="form-control">

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">

                        {{ $category->name }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Sub Category Name</label>

            <input type="text" name="name" class="form-control">

        </div>

        <div class="mb-3">

            <label class="form-label">

                Sort Order

            </label>

            <input type="number" name="sort_order" class="form-control" value="0">

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="1">

                    Active

                </option>

                <option value="0">

                    Inactive

                </option>

            </select>

        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-success">

                Save Sub Category

            </button>

            <a href="{{ route('sub-categories.index') }}" class="btn btn-danger">

                Back
            </a>
        </div>

    </form>
@endsection
