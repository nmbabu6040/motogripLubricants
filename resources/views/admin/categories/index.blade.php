@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between mt-4">

        <h3>Categories</h3>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            Add Category
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
            <th>Image</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach ($categories as $category)
            <tr>

                <td>{{ $category->id }}</td>

                <td>

                    @if ($category->image)
                        <img src="{{ asset('storage/categories/' . $category->image) }}" width="50">
                    @endif

                </td>

                <td>{{ $category->name }}</td>

                <td>
                    {{ $category->status ? 'Active' : 'Inactive' }}
                </td>

                <td>

                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">

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
