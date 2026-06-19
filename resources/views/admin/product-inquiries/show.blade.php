@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">

                <h4 class="mb-0">

                    Product Inquiry Details

                </h4>

                <a href="{{ route('product.inquiries.index') }}" class="btn btn-secondary btn-sm">

                    Back

                </a>

            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>

                        <th width="200">

                            Product

                        </th>

                        <td>

                            {{ $productInquiry->product?->name }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Name

                        </th>

                        <td>

                            {{ $productInquiry->name }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Phone

                        </th>

                        <td>

                            {{ $productInquiry->phone }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Email

                        </th>

                        <td>

                            {{ $productInquiry->email }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Message

                        </th>

                        <td>

                            {!! nl2br(e($productInquiry->message)) !!}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Date

                        </th>

                        <td>

                            {{ $productInquiry->created_at->format('d M Y h:i A') }}

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>
@endsection
