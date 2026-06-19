@extends('admin.layouts.app')

@section('content')
    <h3 class="mt-4">

        Dealer Inquiries

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

            <th>Company</th>

            <th>Phone</th>

            <th>Email</th>

            <th>City</th>

            <th>Action</th>

        </tr>

        @foreach ($inquiries as $inquiry)
            <tr>

                <td>{{ $inquiry->id }}</td>

                <td>{{ $inquiry->name }}</td>

                <td>{{ $inquiry->company }}</td>

                <td>{{ $inquiry->phone }}</td>

                <td>{{ $inquiry->email }}</td>

                <td>{{ $inquiry->city }}</td>

                <td>

                    <div class="d-flex justify-content-center gap-2">

                        <a href="{{ route('dealer.inquiries.show', $inquiry->id) }}" class="btn btn-info btn-sm mb-1">

                            View

                        </a>

                        <form action="{{ route('dealer.inquiries.destroy', $inquiry) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">

                                Delete

                            </button>

                        </form>
                    </div>

                </td>

            </tr>
        @endforeach

    </table>
@endsection
