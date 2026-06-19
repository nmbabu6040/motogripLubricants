@extends('frontend.layouts.master')

@section('content')
    {{-- hero section  --}}
    <section>

        <div class="swiper heroSlider">

            <div class="swiper-wrapper">

                @foreach ($sliders as $slider)
                    <div class="swiper-slide">

                        <div class="">

                            <div>
                                <img src="{{ asset('storage/sliders/' . $slider->image) }}" class="img-fluid w-100">
                            </div>

                            {{-- <div class="col-md-6">

                                        <h1 data-aos="fade-right">

                                            {{ $slider->title }}

                                        </h1>

                                        <p data-aos="fade-up">

                                            {{ $slider->subtitle }}

                                        </p>

                                        <div class="mt-4 d-flex gap-2">

                                            @if ($slider->button_text_1)
                                                @if (strtolower(trim($slider->button_text_1)) == 'download catalog')
                                                    <a href="{{ asset('storage/settings/' . $setting->catalog_pdf) }}"
                                                        download class="btn btn-warning">

                                                        {{ $slider->button_text_1 }}

                                                    </a>
                                                @else
                                                    <a href="{{ $slider->button_link_1 }}" class="btn btn-warning">

                                                        {{ $slider->button_text_1 }}

                                                    </a>
                                                @endif
                                            @endif

                                            @if ($slider->button_text_2)
                                                <a href="{{ $slider->button_link_2 }}" class="btn btn-light ms-2">

                                                    {{ $slider->button_text_2 }}

                                                </a>
                                            @endif

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <img src="{{ asset('storage/sliders/' . $slider->image) }}" class="img-fluid">

                                    </div> --}}

                        </div>

                    </div>
                @endforeach

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    {{-- categories section      --}}
    <section class="py-5">

        <div class="container">

            <h2 class="text-center mb-4 headTitle">

                Product Categories

            </h2>

            <div class="row">

                @foreach ($categories as $category)
                    <div class="col-md-3 mb-4">

                        <a href="{{ route('products', ['category' => $category->id]) }}"
                            class="text-decoration-none text-dark">

                            <div class="card shadow text-center p-3">

                                @if ($category->image)
                                    <div class="card-img ">
                                        <img src="{{ asset('storage/categories/' . $category->image) }}"
                                            class="card-img-top img-fluid">
                                    </div>
                                @endif

                                <div class="card-body text-center">

                                    <h5>{{ $category->name }}</h5>

                                </div>

                            </div>

                        </a>

                    </div>
                @endforeach

            </div>

        </div>

    </section>

    {{-- about sction  --}}
    <section class="py-5">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">
                    <div class="mb-4 aboutImage">
                        <img src="{{ asset('storage/settings/' . $setting->about_image) }}" class="img-fluid w-100">
                    </div>
                </div>

                <div class="col-md-6">

                    <h2 class="headTitle">

                        {{-- About Motogrip --}}

                        {{ $setting->brand_name ?? 'Motogrip' }}

                    </h2>

                    <p>

                        {{-- Motogrip Lubricants is a trusted brand
                        committed to delivering superior
                        lubrication solutions for automotive
                        and industrial applications. --}}

                        {!! nl2br(e($setting->about_short)) !!}

                    </p>

                    <a href="{{ route('about') }}" class="btn btn-success mt-3">

                        Read More

                    </a>

                </div>

            </div>

        </div>

    </section>

    {{-- why choose section  --}}
    <section class="py-5 whyChoose">

        <div class="container">

            <h2 class="text-center mb-5">

                Why Choose Motogrip

            </h2>

            <div class="row text-center">

                <div class="col-md-4">

                    <div class="choosBox">
                        <i class="bi bi-shield-check fs-1 mb-3"></i>

                        <h4>High Performance</h4>

                        <p>
                            Maximum engine protection.
                        </p>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="choosBox">
                        <i class="bi bi-gear fs-1 mb-3"></i>

                        <h4>Long Life</h4>

                        <p>
                            Extended drain intervals.
                        </p>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="choosBox">
                        <i class="bi bi-award fs-1 mb-3"></i>

                        <h4>Reliable Quality</h4>

                        <p>
                            International standard formulation.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- product featured section  --}}
    <section class="py-5">

        <div class="container">

            <h2 class="text-center mb-4 headTitle">

                Featured Products

            </h2>

            <div class="row">

                @foreach ($featuredProducts as $product)
                    <div class="col-lg-4 mb-4">

                        <div class="card h-100 shadow">

                            @if ($product->image)
                                <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top">
                            @endif

                            <div class="card-body">

                                <h5>{{ $product->name }}</h5>

                                <p>
                                    {{ \Illuminate\Support\Str::limit($product->short_description, 80) }}
                                </p>

                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('product.details', $product->slug) }}"
                                        class="btn btn-success btn-md">

                                        View Details

                                    </a>
                                </div>


                            </div>


                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>

    {{-- counter start  --}}
    <section class="countrSec text-white py-5">

        <div class="container">

            <div class="row text-center">

                <div class="col-md-3">

                    <h2><span class="counter" data-target="500">0</span>+</h2>

                    <p>Dealers</p>

                </div>

                <div class="col-md-3">

                    <h2><span class="counter" data-target="100">0</span>+</h2>

                    <p>Products</p>

                </div>

                <div class="col-md-3">

                    <h2><span class="counter" data-target="10">0</span>+</h2>

                    <p>Years Experience</p>

                </div>

                <div class="col-md-3">

                    <h2> <span class="counter" data-target="50">0</span>K+</h2>

                    <p>Customers</p>

                </div>

            </div>

        </div>

    </section>

    {{-- galleries section  --}}
    <section class="py-5 bg-light">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="headTitle">

                    Gallery

                </h2>

                <a href="{{ route('gallery') }}" class="btn btn-outline-success">

                    View All

                </a>

            </div>

            <div class="row">

                @foreach ($galleryImages as $image)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">

                        <img src="{{ asset('storage/gallery/' . $image->image) }}" class="img-fluid rounded shadow"
                            style="height:200px;width:100%;object-fit:cover;">

                    </div>
                @endforeach

            </div>

        </div>

    </section>

    {{-- Latest Videos --}}
    <section class="py-5">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="headTitle">

                    Latest Videos

                </h2>

                <a href="{{ route('video.gallery') }}" class="btn btn-outline-success">

                    View All

                </a>

            </div>

            <div class="row">

                @forelse($latestVideos as $video)
                    @php

                        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/', $video->youtube_url, $matches);

                        $videoId = $matches[1] ?? '';

                    @endphp

                    <div class="col-md-4 mb-4">

                        <div class="card shadow h-100">

                            <iframe height="250" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                allowfullscreen>

                            </iframe>

                            <div class="card-body">

                                <h5>

                                    {{ $video->title }}

                                </h5>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">

                        No Video Available

                    </div>
                @endforelse

            </div>

        </div>

    </section>

    {{-- Latest Blogs --}}
    <section class="py-5 bg-light">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="headTitle">
                    Latest Articles
                </h2>

                <a href="{{ route('blogs') }}" class="btn btn-outline-success">

                    View All

                </a>

            </div>

            <div class="row">

                @forelse($latestBlogs as $blog)
                    <div class="col-md-4 mb-4">

                        <div class="card h-100 shadow-sm">

                            @if ($blog->image)
                                <img src="{{ asset('storage/blogs/' . $blog->image) }}" class="card-img-top img-fluid"
                                    style="height:220px; width:100%;">
                            @endif

                            <div class="card-body">

                                <h5>

                                    {{ $blog->title }}

                                </h5>

                                <p>

                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}

                                </p>

                            </div>

                            <div class="card-footer bg-white border-0">

                                <a href="{{ route('blog.details', $blog->slug) }}" class="btn btn-success">

                                    Read More

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">

                        No Blog Available

                    </div>
                @endforelse

            </div>

        </div>

    </section>

    {{-- faqs section  --}}
    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="headTitle">

                    Frequently Asked Questions

                </h2>

            </div>

            <div class="accordion" id="homeFaqAccordion">

                @foreach ($faqs as $faq)
                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#homeFaq{{ $faq->id }}">

                                {{ $faq->question }}

                            </button>

                        </h2>

                        <div id="homeFaq{{ $faq->id }}"
                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                            data-bs-parent="#homeFaqAccordion">

                            <div class="accordion-body">

                                {!! nl2br(e($faq->answer)) !!}

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

            <div class="text-center mt-4">

                <a href="{{ route('faqs') }}" class="btn btn-outline-success">

                    View All FAQs

                </a>

            </div>

        </div>

    </section>

    {{-- Testimonials --}}

    <section class="py-5 bg-light">


        <div class="container">

            <div class="text-center mb-5">

                <h2 class="fw-bold headTitle">

                    What Our Clients Say

                </h2>

                <p class="text-muted">

                    Trusted by dealers, distributors and customers nationwide.

                </p>

            </div>

            <div class="swiper testimonialSlider">

                <div class="swiper-wrapper py-5">

                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">

                            <div class="card border-0 shadow h-100">

                                <div class="card-body text-center p-4">

                                    @if ($testimonial->image)
                                        <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}"
                                            class="rounded-circle mb-3"
                                            style="width:100px;height:100px;object-fit:cover;">
                                    @else
                                        <img src="https://via.placeholder.com/100" class="rounded-circle mb-3">
                                    @endif

                                    <h5 class="mb-1">

                                        {{ $testimonial->name }}

                                    </h5>

                                    <small class="text-muted">

                                        {{ $testimonial->designation }}

                                    </small>

                                    <div class="my-3">

                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                                class="bi {{ $i <= $testimonial->rating ? 'bi-star-fill' : 'bi-star' }} text-warning"></i>
                                        @endfor

                                    </div>

                                    <p class="mb-0">

                                        "{{ $testimonial->message }}"

                                    </p>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

                <div class="swiper-pagination testimonial-pagination"></div>

            </div>

        </div>


    </section>


    {{-- cta section  --}}
    <section class="py-5 text-center">

        <div class="container">

            <h2 class="fw-bold headTitle">

                Ready To Grow Your Lubricants Business?

            </h2>

            <p>

                Join Motogrip's nationwide dealer network and gain access to premium products, marketing support, and
                competitive pricing.

            </p>

            <a href="{{ route('dealer.inquiry') }}" class="btn btn-success">

                Become Dealer

            </a>

            <a href="{{ route('contact') }}" class="btn btn-outline-success ms-2">

                Contact Us

            </a>

        </div>

    </section>
@endsection

@push('styles')
    <style>
        .whyChoose {
            background-color: #084B47;
            color: #ffffff;
        }

        .choosBox i {
            color: #ED1C24;
        }
    </style>
@endpush

@push('scripts')
    <script>
        const counters = document.querySelectorAll('.counter');

        counters.forEach(counter => {
            const updateCounter = () => {
                const target = +counter.getAttribute('data-target');
                const current = +counter.innerText;

                const increment = target / 100;

                if (current < target) {
                    counter.innerText = Math.ceil(current + increment);
                    setTimeout(updateCounter, 20);
                } else {
                    counter.innerText = target;
                }
            };

            updateCounter();
        });
    </script>
@endpush
