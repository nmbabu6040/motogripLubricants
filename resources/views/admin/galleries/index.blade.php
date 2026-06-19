@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">

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

            <table class="table table-bordered">

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
