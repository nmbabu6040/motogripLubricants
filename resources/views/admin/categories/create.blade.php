@extends('admin.layouts.app')

@section('content')
    <div class="py-4">
        <h3 class="mt-4">Add Category</h3>

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label>Name</label>

                <input type="text" name="name" class="form-control">

            </div>

            <div class="mb-3">

                <label>Image</label>

                <input type="file" name="image" class="form-control">

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

                    <option value="1">Active</option>
                    <option value="0">Inactive</option>

                </select>

            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-success">
                    Save Category
                </button>

                <a href="{{ route('categories.index') }}" class="btn btn-danger">
                    Back
                </a>
            </div>

        </form>
    </div>
@endsection
