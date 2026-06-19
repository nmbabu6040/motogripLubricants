@extends('frontend.layouts.master')

@section('title', $product->meta_title ?? $product->name)

@section('meta_description', $product->meta_description ?? $product->short_description)

@section('content')

    {{-- product info start  --}}
    <section class="py-5">

        <div class="container">

            <div class="row g-4">

                <div class="col-lg-5">



                    @if ($product->image)
                        <img id="mainProductImage" src="{{ asset('storage/products/' . $product->image) }}"
                            class="img-fluid rounded shadow border w-100" style="height:450px;object-fit:contain;">
                    @endif


                    @if ($product->images->count())
                        <div class="row mt-3">

                            @foreach ($product->images as $image)
                                <div class="col-3 mb-2">

                                    <img src="{{ asset('storage/products/gallery/' . $image->image) }}"
                                        class="img-fluid border rounded gallery-thumb"
                                        style="cursor:pointer;height:80px;width:100%;object-fit:cover;">

                                </div>
                            @endforeach

                        </div>
                    @endif
                </div>

                <div class="col-lg-7">

                    <nav aria-label="breadcrumb" class="mb-3">

                        <ol class="breadcrumb product-breadcrumb">

                            <li class="breadcrumb-item">

                                <a href="{{ route('home') }}">

                                    Home

                                </a>

                            </li>

                            <li class="breadcrumb-item">

                                <a href="{{ route('category.show', $product->category->slug) }}">

                                    {{ $product->category->name }}

                                </a>

                            </li>

                            @if ($product->subCategory)
                                <li class="breadcrumb-item">

                                    <a href="{{ route('subcategory.show', $product->subCategory->slug) }}">

                                        {{ $product->subCategory->name }}

                                    </a>

                                </li>
                            @endif

                            <li class="breadcrumb-item active">

                                {{ $product->name }}

                            </li>

                        </ol>

                    </nav>

                    <h2 class="fw-bold mb-3">

                        {{ $product->name }}

                    </h2>

                    <div class="mb-3">

                        <span class="badge bg-primary">

                            Category:
                            {{ $product->category?->name }}

                        </span>

                        @if ($product->subCategory)
                            <span class="badge bg-secondary">

                                Sub Category:
                                {{ $product->subCategory->name }}

                            </span>
                        @endif

                    </div>

                    @if ($product->short_description)
                        <div class="alert alert-light border">

                            {!! $product->short_description !!}

                        </div>
                    @endif

                    <div class="mb-4">

                        {{-- {!! nl2br(e($product->description)) !!} --}}
                        {!! $product->description !!}

                    </div>


                    @if ($product->specifications->count())
                        <div class="mt-4">

                            <h4 class="mb-3">

                                Technical Specifications

                            </h4>

                            <div class="table-responsive">

                                <table class="table table-bordered table-striped">

                                    <tbody>

                                        @foreach ($product->specifications as $spec)
                                            <tr class="">

                                                <th width="35%">

                                                    {{ $spec->spec_name }}

                                                </th>

                                                <td class="text-center">

                                                    {{ $spec->spec_value }}

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>
                    @endif


                    @if ($product->datasheet_pdf)
                        <div class="my-4">

                            <a href="{{ asset('storage/products/' . $product->datasheet_pdf) }}" target="_blank"
                                class="btn btn-danger">

                                <i class="bi bi-file-earmark-pdf"></i>

                                Download Datasheet

                            </a>

                        </div>
                    @endif


                    @if ($setting && $setting->catalog_pdf)
                        <a href="{{ asset('storage/settings/' . $setting->catalog_pdf) }}" download
                            class="btn btn-warning ms-2">

                            Download Catalog

                        </a>
                    @endif

                    <a href="{{ route('products') }}" class="btn btn-outline-dark ms-2">

                        Back To Products

                    </a>

                </div>

            </div>

        </div>

    </section>

    {{-- Product Inquiry Section Start --}}
    <section class="py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="card shadow border-0">

                        <div class="card-header bg-primary text-white">

                            <h4 class="mb-0">

                                Product Inquiry

                            </h4>

                        </div>

                        <div class="card-body p-4">

                            @if (session('success'))
                                <div class="alert alert-success">

                                    {{ session('success') }}

                                </div>
                            @endif

                            <form action="{{ route('product.inquiry') }}" method="POST">

                                @csrf

                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <div class="row">

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            Name <span class="text-danger">*</span>

                                        </label>

                                        <input type="text" name="name" class="form-control" required>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">

                                            Phone <span class="text-danger">*</span>

                                        </label>

                                        <input type="text" name="phone" class="form-control" required>

                                    </div>

                                    <div class="col-md-12 mb-3">

                                        <label class="form-label">

                                            Email

                                        </label>

                                        <input type="email" name="email" class="form-control">

                                    </div>

                                    <div class="col-md-12 mb-4">

                                        <label class="form-label">

                                            Message

                                        </label>

                                        <textarea name="message" rows="5" class="form-control" placeholder="Write your inquiry here..."></textarea>

                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">

                                    <i class="bi bi-send"></i>

                                    Send Inquiry

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    {{-- Product Inquiry Section End --}}

    {{-- releted product start  --}}
    @if ($relatedProducts->count())

        <section class="mt-5">

            <div class="container">

                <h3 class="fw-bold mb-4">

                    Related Products

                </h3>

                <div class="swiper relatedProductSwiper">

                    <div class="swiper-wrapper">

                        @foreach ($relatedProducts as $item)
                            <div class="swiper-slide">

                                <div class="card border-0 shadow-sm h-100 p-4 mb-4">

                                    @if ($item->image)
                                        <img src="{{ asset('storage/products/' . $item->image) }}" class="card-img-top"
                                            style="height:220px;object-fit:cover;">
                                    @endif

                                    <div class="card-body text-center">

                                        <h6>

                                            {{ $item->name }}

                                        </h6>

                                        <a href="{{ route('product.details', $item->slug) }}"
                                            class="btn btn-primary btn-sm">

                                            View Details

                                        </a>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="swiper-pagination mt-3"></div>

                </div>
            </div>

        </section>

    @endif


    @push('scripts')
        <script>
            document
                .querySelectorAll('.gallery-thumb')
                .forEach(function(img) {

                    img.addEventListener('click', function() {

                        document
                            .getElementById('mainProductImage')
                            .src = this.src;

                    });

                });
        </script>

        <script>
            new Swiper(".relatedProductSwiper", {

                slidesPerView: 4,
                spaceBetween: 20,

                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },

                breakpoints: {

                    320: {
                        slidesPerView: 1,
                    },

                    576: {
                        slidesPerView: 2,
                    },

                    992: {
                        slidesPerView: 4,
                    }

                }

            });
        </script>
    @endpush


@endsection
