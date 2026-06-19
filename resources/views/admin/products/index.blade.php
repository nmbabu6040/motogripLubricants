@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between mt-4">

        <h3>Products</h3>

        <a href="{{ route('products.create') }}"
            class="btn btn-primary {{ request()->routeIs('products.create') ? 'active' : '' }}">
            Add Products
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
            <th>Product Name</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Featured</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach ($products as $product)
            <tr>

                <td>{{ $product->id }}</td>

                <td>

                    @if ($product->image)
                        <img src="{{ asset('storage/products/' . $product->image) }}" width="60" class="img-thumbnail">
                    @endif

                </td>

                <td>{{ $product->name }}</td>

                <td>{{ $product->category->name ?? 'N/A' }}</td>

                <td>
                    {{ $product->subCategory?->name ?? '-' }}
                </td>

                <td>
                    {{ $product->featured ? 'Yes' : 'No' }}
                </td>

                <td>
                    {{ $product->status ? 'Active' : 'Inactive' }}
                </td>

                <td>

                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">

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
