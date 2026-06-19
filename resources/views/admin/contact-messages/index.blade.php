@extends('admin.layouts.app')

@section('content')
    <h3 class="mt-4">

        Contact Messages

    </h3>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <table class="table table-bordered mt-3">

        <tr>

            <th>ID</th>

            <th>Name</th>

            <th>Phone</th>

            <th>Email</th>

            <th>Subject</th>

            <th>Action</th>

        </tr>

        @foreach ($messages as $message)
            <tr>

                <td>{{ $message->id }}</td>

                <td>{{ $message->name }}</td>

                <td>{{ $message->phone }}</td>

                <td>{{ $message->email }}</td>

                <td>{{ $message->subject }}</td>

                <td>

                    <div class="d-flex justify-content-center gap-1">

                        <a href="{{ route('contact.messages.show', $message->id) }}" class="btn btn-info btn-sm mb-1">

                            View

                        </a>

                        <form action="{{ route('contact.messages.destroy', $message) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Delete Message?')" class="btn btn-danger btn-sm">

                                Delete

                            </button>

                        </form>
                    </div>

                </td>

            </tr>
        @endforeach

    </table>
@endsection
