@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>

            Media Gallery

        </h3>

        <a href="{{ route('galleries.create') }}" class="btn btn-primary">

            Add Image

        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered" id="dataTable">

                <thead>

                    <tr>

                        <th width="80">

                            Image

                        </th>

                        <th>

                            Title

                        </th>

                        <th width="120">

                            Sort

                        </th>

                        <th width="100">

                            Status

                        </th>

                        <th width="180">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($galleries as $gallery)
                        <tr>

                            <td>

                                <img src="{{ asset('storage/gallery/' . $gallery->image) }}" width="60">

                            </td>

                            <td>

                                {{ $gallery->title }}

                            </td>

                            <td>

                                {{ $gallery->sort_order }}

                            </td>

                            <td>

                                @if ($gallery->status)
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

                                <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST"
                                    class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this image?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center">

                                No Gallery Image Found

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

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
