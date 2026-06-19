@extends('frontend.layouts.master')

@section('title', $subCategory->name)

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="mb-4">

                <h2 class="fw-bold">

                    {{ $subCategory->name }}

                </h2>

                <p class="text-muted">

                    Total Products:
                    {{ $products->total() }}

                </p>

            </div>

            <div class="row">

                @forelse($products as $product)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">

                        <div class="card h-100 shadow-sm border-0">

                            @if ($product->image)
                                <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top"
                                    style="height:220px;object-fit:cover;">
                            @endif

                            <div class="card-body text-center">

                                <h6>

                                    {{ $product->name }}

                                </h6>

                                <a href="{{ route('product.details', $product->slug) }}" class="btn btn-primary btn-sm">

                                    View Details

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">

                        <h5>

                            No Products Found

                        </h5>

                    </div>
                @endforelse

            </div>

            <div class="mt-4">

                {{ $products->links() }}

            </div>

        </div>

    </section>

@endsection
