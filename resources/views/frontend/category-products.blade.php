@extends('frontend.layouts.master')

@section('title', $category->name)

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="mb-4">

                <h2 class="fw-bold">

                    {{ $category->name }}

                </h2>

                <p class="text-muted">

                    Total Products:
                    {{ $products->total() }}

                </p>

            </div>

            <div class="row">

                <div class="col-lg-3">

                    <div class="card shadow-sm">

                        <div class="card-header">

                            <strong>

                                Categories

                            </strong>

                        </div>

                        <div class="list-group list-group-flush">

                            @foreach ($categories as $cat)
                                <a href="{{ route('category.show', $cat->slug) }}"
                                    class="list-group-item list-group-item-action
                        {{ $cat->id == $category->id ? 'active' : '' }}">

                                    {{ $cat->name }}

                                </a>
                            @endforeach

                        </div>

                    </div>

                    <div class="card shadow-sm mt-4">

                        <div class="card-header">

                            <strong>

                                Sub Categories

                            </strong>

                        </div>

                        <div class="list-group list-group-flush">

                            <a href="{{ route('category.show', $category->slug) }}"
                                class="list-group-item list-group-item-action">

                                All Products

                            </a>

                            @foreach ($subCategories as $sub)
                                <a href="{{ route('subcategory.show', $sub->slug) }}"
                                    class="list-group-item list-group-item-action">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <span>

                                            {{ $sub->name }}

                                        </span>

                                        <span class="badge bg-secondary">

                                            {{ $sub->products_count }}

                                        </span>

                                    </div>

                                </a>
                            @endforeach

                        </div>

                    </div>

                </div>

                <div class="col-lg-9">

                    <div class="row">

                        @forelse($products as $product)
                            <div class="col-lg-4 col-md-6 mb-4">

                                <div class="card h-100 shadow-sm border-0">

                                    @if ($product->image)
                                        <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top"
                                            style="height:220px;object-fit:cover;">
                                    @endif

                                    <div class="card-body text-center">

                                        <h6>

                                            {{ $product->name }}

                                        </h6>

                                        <a href="{{ route('product.details', $product->slug) }}"
                                            class="btn btn-primary btn-sm">

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

                </div>

            </div>

            <div class="mt-4">

                {{ $products->links() }}

            </div>

        </div>

    </section>

@endsection
