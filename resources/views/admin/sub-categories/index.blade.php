@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between mt-4">

        <h3>Sub Categories</h3>

        <a href="{{ route('sub-categories.create') }}" class="btn btn-primary">

            Add Sub Category

        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">

            {{ session('success') }}

        </div>
    @endif

    <table class="table table-bordered mt-3">

        <tr>

            <th>ID</th>

            <th>Category</th>

            <th>Name</th>

            <th>Status</th>

            <th>Action</th>

        </tr>

        @foreach ($subCategories as $subCategory)
            <tr>

                <td>{{ $subCategory->id }}</td>

                <td>{{ $subCategory->category->name }}</td>

                <td>{{ $subCategory->name }}</td>

                <td>

                    {{ $subCategory->status ? 'Active' : 'Inactive' }}

                </td>

                <td>

                    <a href="{{ route('sub-categories.edit', $subCategory) }}" class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('sub-categories.destroy', $subCategory) }}" method="POST" class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>
        @endforeach

    </table>
@endsection
