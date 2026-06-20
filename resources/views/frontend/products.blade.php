@extends('frontend.layouts.master')

@section('content')
    <div class="container py-5">

        <h2 class="mb-4">

            Our Products

        </h2>

        <form method="GET">

            <div class="row mb-4">

                <div class="col-md-3">

                    <select name="category" class="form-control">

                        <option value="">

                            All Categories

                        </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">

                    <select name="sub_category" class="form-control">

                        <option value="">

                            All Sub Categories

                        </option>

                        @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}"
                                {{ request('sub_category') == $subCategory->id ? 'selected' : '' }}>

                                {{ $subCategory->name }}

                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="col-md-4">

                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Search Product">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary w-100">

                        Search

                    </button>

                </div>

            </div>

        </form>

        <div class="row">

            @forelse($products as $product)
                <div class="col-md-4 mb-4">

                    <div class="card h-100 shadow-sm">

                        @if ($product->image)
                            <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top">
                        @endif

                        <div class="card-body">

                            <h5>

                                {{ $product->name }}

                            </h5>

                            <p>

                                {{-- {{ Str::limit($product->short_description, 60) }} --}}
                                {!! \Illuminate\Support\Str::limit($product->short_description, 100) !!}
                                {{-- {!! $product->short_description !!} --}}


                            </p>

                            <a href="{{ route('product.details', $product->slug) }}" class="btn btn-success">

                                View Details

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning">

                        No Products Found

                    </div>

                </div>
            @endforelse

        </div>

        <div class="mt-4 text-center">

            {{ $products->withQueryString()->links() }}

        </div>

    </div>
@endsection
