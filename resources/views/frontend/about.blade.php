@extends('frontend.layouts.master')

@section('content')
    {{-- about section  --}}
    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h1 class="fw-bold headTitle">

                    About Us

                </h1>

            </div>

            <div class="row align-items-center">

                <div class="col-lg-6">

                    @if ($setting->about_image)
                        <div class="aboutImage rounded">
                            <img src="{{ asset('storage/settings/' . $setting->about_image) }}" class="img-fluid rounded">
                        </div>
                    @endif

                </div>

                <div class="col-lg-6">

                    {{-- <h2 class="headTitle">

                        {{ $setting->company_name }}

                    </h2> --}}

                    @if ($setting->brand_name)
                        <h2 class=" headTitle mb-3">

                            {{ $setting->brand_name }}

                        </h2>
                    @endif

                    <p class="about-content text-justify">

                        {!! nl2br(e($setting->about_short)) !!}

                    </p>

                </div>

            </div>

        </div>

    </section>

    {{-- mission section  --}}
    <section class="py-5 bg-light">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    @if ($setting->mission_image)
                        <img src="{{ asset('storage/settings/' . $setting->mission_image) }}"
                            class="img-fluid rounded shadow w-100">
                    @endif

                </div>

                <div class="col-lg-6">

                    <h2 class="headTitle">

                        Our Mission

                    </h2>

                    <p class="text-justify">

                        {!! nl2br(e($setting->mission)) !!}

                    </p>

                </div>

            </div>

        </div>

    </section>

    {{-- vission section --}}
    <section class="py-5">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h2 class="headTitle">

                        Our Vision

                    </h2>

                    <p class="text-justify">

                        {!! nl2br(e($setting->vision)) !!}

                    </p>

                </div>

                <div class="col-lg-6">

                    @if ($setting->vision_image)
                        <img src="{{ asset('storage/settings/' . $setting->vision_image) }}"
                            class="img-fluid rounded shadow w-100" style="height:350px; object-fit:cover;">
                    @endif

                </div>

            </div>

        </div>

    </section>


    @if ($setting->chairman_image || $setting->chairman_name || $setting->chairman_designation || $setting->chairman_message)
        <section class="py-5 bg-light">

            <div class="container">

                <div class="text-center mb-5">

                    <h2 class="headTitle">

                        Chairman Message

                    </h2>

                </div>

                <div class="row align-items-center">

                    <div class="col-lg-4 text-center">

                        @if ($setting->chairman_image)
                            <img src="{{ asset('storage/settings/' . $setting->chairman_image) }}"
                                class="rounded-circle shadow" style="width:220px;height:220px;object-fit:cover;">
                        @endif

                        @if ($setting->chairman_name)
                            <h4 class="mt-3">

                                {{ $setting->chairman_name }}

                            </h4>
                        @endif

                        @if ($setting->chairman_designation)
                            <p class="text-muted">

                                {{ $setting->chairman_designation }}

                            </p>
                        @endif

                    </div>

                    <div class="col-lg-8">

                        <div class="card shadow">

                            <div class="card-body">

                                {!! nl2br(e($setting->chairman_message)) !!}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
    @endif


    <section class="py-5 bg-light text-dark text-center">

        <div class="container">

            <h2 class="fw-bold">

                Ready To Work With Us?

            </h2>

            <p class="mb-4">

                Contact our team today or become an authorized dealer.

            </p>

            <a href="/contact-us" class="btn btn-primary">

                Contact Us

            </a>

            <a href="/dealer-inquiry" class="btn btn-warning ms-2">

                Become Dealer

            </a>

            @if ($setting && $setting->catalog_pdf)
                <a href="{{ asset('storage/settings/' . $setting->catalog_pdf) }}" download class="btn btn-success ms-2">

                    Download Catalog

                </a>
            @endif

        </div>

    </section>
@endsection

@push('styles')
    <style>
        .aboutImage {
            min-height: auto;
            height: 400px;
            width: 100%;
            min-width: 100%;
            overflow: hidden;
        }

        .aboutImage img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
    </style>
@endpush
