@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">

        <h3>Menus</h3>

        <a href="{{ route('menus.create') }}" class="btn btn-success">

            Add Menu

        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered align-middle" id="dataTable">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Title</th>

                        <th>URL</th>

                        <th>Order</th>

                        <th>Status</th>

                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($menus as $menu)
                        <tr>

                            <td>{{ $menu->id }}</td>

                            <td>{{ $menu->title }}</td>

                            <td>{{ $menu->url }}</td>

                            <td>{{ $menu->sort_order }}</td>

                            <td>

                                @if ($menu->status)
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

                                <a href="{{ route('menus.edit', $menu) }}" class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center">

                                No Menu Found

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
