@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between my-4">

        <h3>Sub Categories</h3>

        <a href="{{ route('sub-categories.create') }}" class="btn btn-success">

            Add Sub Category

        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">

            {{ session('success') }}

        </div>
    @endif

    <table class="table table-bordered mt-3 mb-5" id="dataTable">

        <thead>
            <tr>

                <th>ID</th>

                <th>Category</th>

                <th>Name</th>

                <th>Status</th>

                <th>Action</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($subCategories as $subCategory)
                <tr>

                    <td>{{ $subCategory->id }}</td>

                    <td>{{ $subCategory->category->name }}</td>

                    <td>{{ $subCategory->name }}</td>

                    <td>{{ $subCategory->status ? 'Active' : 'Inactive' }}</td>

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
        </tbody>

    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#dataTable').DataTable({

                responsive: true,

                pageLength: 10,

                ordering: true,

                searching: true,

                lengthChange: true,

            });

        });
    </script>
@endpush

@push('styles')
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            margin-top: 20px;
        }
    </style>
@endpush
