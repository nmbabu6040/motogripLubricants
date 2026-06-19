@extends('frontend.layouts.master')

@section('title', 'Page Not Found')

@section('content')

    <section class="py-5">

        <div class="container text-center">

            <h1 class="display-1 fw-bold text-primary">

                404

            </h1>

            <h2 class="mb-3">

                Page Not Found

            </h2>

            <p class="text-muted mb-4">

                The page you are looking for does not exist or has been moved.

            </p>

            <a href="{{ route('home') }}" class="btn btn-primary me-2">

                Back To Home

            </a>

            <a href="{{ route('products') }}" class="btn btn-outline-primary">

                Browse Products

            </a>

        </div>

    </section>

@endsection
