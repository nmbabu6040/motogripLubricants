@extends('admin.layouts.app')

@section('content')
    <div class="dashBoardPanel">
        <h2 class="mt-4 headTitle">

            Dashboard

        </h2>

        <div class="row mt-4">

            <div class="col-md-3 mb-4">

                <div class="card text-center bg-success">

                    <div class="card-body">

                        <h3 class="text-white fw-bold fs-1">

                            {{ $totalProducts }}

                        </h3>

                        <p class="text-white fw-bold">

                            Products

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card text-center bg-danger">

                    <div class="card-body">

                        <h3 class="text-white fw-bold fs-1">

                            {{ $totalCategories }}

                        </h3>

                        <p class="text-white fw-bold">

                            Categories

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card text-center bg-warning">

                    <div class="card-body">

                        <h3 class="text-white fw-bold fs-1">

                            {{ $totalDealerInquiries }}

                        </h3>

                        <p class="text-white fw-bold">

                            Dealer Inquiries

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card text-center bg-info">

                    <div class="card-body">

                        <h3 class="text-white fw-bold fs-1">

                            {{ $totalProductInquiries }}

                        </h3>

                        <p class="text-white fw-bold">

                            Product Inquiries

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card text-center bg-primary">

                    <div class="card-body">

                        <h3 class="text-white fw-bold fs-1">

                            {{ $totalContactMessages }}

                        </h3>

                        <p class="text-white fw-bold">

                            Contact Messages

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card text-center bg-secondary">

                    <div class="card-body">

                        <h3 class="text-white fw-bold fs-1">

                            {{ $totalVisitors }}

                        </h3>

                        <p class="text-white fw-bold">

                            Total Visitors

                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="row mt-4">

            {{-- Latest Product Inquiries --}}
            <div class="col-lg-4 mb-4">

                <div class="card">

                    <div class="card-header bg-info text-white fw-bold">

                        Latest Product Inquiries

                    </div>

                    <div class="card-body bg-primary p-3">

                        <table class="table table-sm mb-0">

                            <tbody>

                                @forelse($latestProductInquiries as $item)
                                    <tr>

                                        <td>

                                            {{ $item->name }}

                                        </td>

                                        <td>

                                            {{ $item->product?->name }}

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="2">

                                            No Data

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            {{-- Latest Dealer Inquiries --}}
            <div class="col-lg-4 mb-4">

                <div class="card">

                    <div class="card-header bg-warning text-white fw-bold">

                        Latest Dealer Inquiries

                    </div>

                    <div class="card-body bg-danger p-3">

                        <table class="table table-sm mb-0">

                            <tbody>

                                @forelse($latestDealerInquiries as $item)
                                    <tr class="">

                                        <td>

                                            {{ $item->name }}

                                        </td>

                                        <td>

                                            {{ $item->phone }}

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="2">

                                            No Data

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            {{-- Latest Contact Messages --}}
            <div class="col-lg-4 mb-4">

                <div class="card">

                    <div class="card-header bg-secondary text-white fw-bold">

                        Latest Contact Messages

                    </div>

                    <div class="card-body bg-success p-3">

                        <table class="table table-sm mb-0">

                            <tbody>

                                @forelse($latestContactMessages as $item)
                                    <tr class="">

                                        <td>

                                            {{ $item->name }}

                                        </td>

                                        <td>

                                            {{ $item->email }}

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td>

                                            No Data

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
