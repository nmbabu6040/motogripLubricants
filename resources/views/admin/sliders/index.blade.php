@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between mt-4">

        <h3>Sliders</h3>

        <a href="{{ route('sliders.create') }}" class="btn btn-primary">

            Add Slider

        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">

            {{ session('success') }}

        </div>
    @endif

    <table class="table table-bordered mt-3" id="dataTable">

        <thead>
            <tr>

                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($sliders as $slider)
                <tr>

                    <td>{{ $slider->id }}</td>

                    <td>

                        <img src="{{ asset('storage/sliders/' . $slider->image) }}" width="80">

                    </td>

                    <td>{{ $slider->title }}</td>

                    <td>{{ $slider->sort_order }}</td>

                    <td>

                        {{ $slider->status ? 'Active' : 'Inactive' }}

                    </td>

                    <td>

                        <a href="{{ route('sliders.edit', $slider) }}" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('sliders.destroy', $slider) }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">

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
