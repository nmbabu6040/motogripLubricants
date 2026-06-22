@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">


        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3>

                Testimonials

            </h3>

            <a href="{{ route('testimonials.create') }}" class="btn btn-primary">

                Add Testimonial

            </a>

        </div>

        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif

        <div class="card">

            <div class="card-body">

                <table class="table table-bordered table-striped" id="dataTable">

                    <thead>

                        <tr>

                            <th width="80">

                                Image

                            </th>

                            <th>

                                Name

                            </th>

                            <th>

                                Designation

                            </th>

                            <th>

                                Sort Order

                            </th>

                            <th>

                                Status

                            </th>

                            <th width="150">

                                Action

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($testimonials as $testimonial)
                            <tr>

                                <td>

                                    @if ($testimonial->image)
                                        <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}"
                                            width="60">
                                    @endif

                                </td>

                                <td>

                                    {{ $testimonial->name }}

                                </td>

                                <td>

                                    {{ $testimonial->designation }}

                                </td>

                                <td>

                                    {{ $testimonial->sort_order }}

                                </td>

                                <td>

                                    @if ($testimonial->status)
                                        <span class="badge bg-success">

                                            Active

                                        </span>
                                    @else
                                        <span class="badge bg-danger">

                                            Inactive

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                        class="btn btn-sm btn-warning">

                                        Edit

                                    </a>

                                    <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center">

                                    No Testimonial Found

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


    </div>
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
