@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mt-3">
        <h3 class="mt-4">

            Users

        </h3>

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">

            Add User

        </a>

    </div>
    <div class="card">

        <div class="card-body">

            <table class="table table-bordered" id="dataTable">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($users as $user)
                        <tr>

                            <td>{{ $user->id }}</td>

                            <td>{{ $user->name }}</td>

                            <td>{{ $user->email }}</td>

                            <td>

                                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete this user?')" class="btn btn-danger btn-sm">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach

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
