@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">


        <h3>Blogs</h3>

        <a href="{{ route('blogs.create') }}" class="btn btn-primary">

            Add Blog

        </a>


    </div>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <div class="card">


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle" id="dataTable">

                    <thead>

                        <tr>

                            <th width="70">ID</th>

                            <th width="100">Image</th>

                            <th>Title</th>

                            <th>Author</th>

                            <th>Published</th>

                            <th width="120">Status</th>

                            <th width="180">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($blogs as $blog)
                            <tr>

                                <td>

                                    {{ $blog->id }}

                                </td>

                                <td>

                                    @if ($blog->image)
                                        <img src="{{ asset('storage/blogs/' . $blog->image) }}" width="70"
                                            class="img-thumbnail">
                                    @endif

                                </td>

                                <td>

                                    {{ $blog->title }}

                                </td>

                                <td>

                                    {{ $blog->author_name ?? 'Admin' }}

                                </td>

                                <td>

                                    @if ($blog->published_at)
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}
                                    @else
                                        {{ $blog->created_at->format('d M Y') }}
                                    @endif

                                </td>

                                <td>

                                    @if ($blog->status)
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

                                    <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-warning">

                                        Edit

                                    </a>

                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteBlog{{ $blog->id }}">

                                        Delete

                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center">

                                    No Blogs Found

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


    </div>

    @foreach ($blogs as $blog)
        <div class="modal fade" id="deleteBlog{{ $blog->id }}" tabindex="-1">


            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title">

                            Delete Blog

                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>

                    </div>

                    <div class="modal-body">

                        Are you sure you want to delete this blog?

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                            Cancel

                        </button>

                        <form action="{{ route('blogs.destroy', $blog) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">

                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            </div>


        </div>
    @endforeach
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
