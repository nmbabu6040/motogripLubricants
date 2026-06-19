@extends('admin.layouts.app')

@section('content')
    <div class="card">

        <div class="card-header d-flex justify-content-between">

            <h4>

                Contact Message Details

            </h4>

            <a href="{{ route('contact.messages.index') }}" class="btn btn-secondary btn-sm">

                Back

            </a>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="200">Name</th>
                    <td>{{ $contactMessage->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $contactMessage->email }}</td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td>{{ $contactMessage->phone }}</td>
                </tr>

                <tr>
                    <th>Subject</th>
                    <td>{{ $contactMessage->subject }}</td>
                </tr>

                <tr>
                    <th>Message</th>
                    <td>{!! nl2br(e($contactMessage->message)) !!}</td>
                </tr>

                <tr>
                    <th>Date</th>
                    <td>{{ $contactMessage->created_at->format('d M Y h:i A') }}</td>
                </tr>

            </table>

        </div>

    </div>
@endsection
