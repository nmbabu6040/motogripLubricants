@extends('admin.layouts.app')

@section('content')
    <div class="card">


        <div class="card-header d-flex justify-content-between align-items-center">

            <h4>

                Video Gallery List

            </h4>

            <a href="{{ route('video-galleries.create') }}" class="btn btn-primary">

                Add Video

            </a>

        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">

                    {{ session('success') }}

                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th width="80">

                                ID

                            </th>

                            <th>

                                Title

                            </th>

                            <th>

                                Video

                            </th>

                            <th width="120">

                                Status

                            </th>

                            <th width="120">

                                Sort Order

                            </th>

                            <th width="180">

                                Action

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($videos as $video)
                            <tr>

                                <td>

                                    {{ $video->id }}

                                </td>

                                <td>

                                    {{ $video->title }}

                                </td>

                                <td>

                                    <a href="{{ $video->youtube_url }}" target="_blank">

                                        View Video

                                    </a>

                                </td>

                                <td>

                                    @if ($video->status)
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

                                    {{ $video->sort_order }}

                                </td>

                                <td>

                                    <a href="{{ route('video-galleries.edit', $video->id) }}"
                                        class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <form action="{{ route('video-galleries.destroy', $video->id) }}" method="POST"
                                        class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this video?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center">

                                    No Video Found

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


    </div>
@endsection
