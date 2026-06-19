@extends('admin.layouts.app')

@section('content')
    <div class="card">

        <div class="card-header d-flex justify-content-between">

            <h4>

                Dealer Inquiry Details

            </h4>

            <a href="{{ route('dealer.inquiries.index') }}" class="btn btn-secondary btn-sm">

                Back

            </a>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="200">Name</th>
                    <td>{{ $dealerInquiry->name }}</td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td>{{ $dealerInquiry->phone }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $dealerInquiry->email }}</td>
                </tr>

                <tr>
                    <th>Company</th>
                    <td>{{ $dealerInquiry->company_name }}</td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td>{{ $dealerInquiry->address }}</td>
                </tr>

                <tr>
                    <th>Message</th>
                    <td>{!! nl2br(e($dealerInquiry->message)) !!}</td>
                </tr>

                <tr>
                    <th>Date</th>
                    <td>{{ $dealerInquiry->created_at->format('d M Y h:i A') }}</td>
                </tr>

            </table>

        </div>

    </div>
@endsection
