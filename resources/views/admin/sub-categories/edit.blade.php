@extends('admin.layouts.app')

@section('content')
    <h3 class="mt-4">

        Edit Sub Category

    </h3>

    <form action="{{ route('sub-categories.update', $subCategory) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Category</label>

            <select name="category_id" class="form-control">

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $subCategory->category_id == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Sub Category Name</label>

            <input type="text" name="name" value="{{ $subCategory->name }}" class="form-control">

        </div>

        <div class="mb-3">

            <label class="form-label">

                Sort Order

            </label>

            <input type="number" name="sort_order" class="form-control" value="{{ $subCategory->sort_order }}">

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="1" {{ $subCategory->status == 1 ? 'selected' : '' }}>

                    Active

                </option>

                <option value="0" {{ $subCategory->status == 0 ? 'selected' : '' }}>

                    Inactive

                </option>

            </select>

        </div>

        <button class="btn btn-success">

            Update

        </button>

    </form>
@endsection
