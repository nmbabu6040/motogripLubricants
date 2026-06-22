@extends('admin.layouts.app')

@section('title', 'Product Inquiries')

@section('content')

    <div class="container-fluid">

        <div class="card shadow-sm">

            <div class="card-header">

                <h4 class="mb-0">

                    Product Inquiries

                </h4>

            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>
                @endif

                <div class="table-responsive">

                    <table class="table table-bordered table-striped" id="dataTable">

                        <thead>

                            <tr>

                                <th>ID</th>

                                <th>Product</th>

                                <th>Name</th>

                                <th>Phone</th>

                                <th>Email</th>

                                <th>Date</th>

                                <th width="120">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($inquiries as $inquiry)
                                <tr>

                                    <td>

                                        {{ $inquiry->id }}

                                    </td>

                                    <td>

                                        {{ $inquiry->product?->name }}

                                    </td>

                                    <td>

                                        {{ $inquiry->name }}

                                    </td>

                                    <td>

                                        {{ $inquiry->phone }}

                                    </td>

                                    <td>

                                        {{ $inquiry->email }}

                                    </td>

                                    <td>

                                        {{ $inquiry->created_at->format('d M Y') }}

                                    </td>

                                    <td>

                                        <div class="d-flex justify-content-center gap-1">

                                            <a href="{{ route('product.inquiries.show', $inquiry->id) }}"
                                                class="btn btn-info btn-sm mb-1">

                                                View

                                            </a>

                                            <form action="{{ route('product.inquiries.destroy', $inquiry->id) }}"
                                                method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete Inquiry?')">

                                                    Delete

                                                </button>

                                            </form>
                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7" class="text-center">

                                        No Inquiry Found

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-3">

                    {{ $inquiries->links() }}

                </div>

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
