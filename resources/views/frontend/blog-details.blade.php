@extends('frontend.layouts.master')

@section('title', $blog->meta_title ?? $blog->title)

@section('meta_description', $blog->meta_description ?? $blog->short_description)

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blogs') }}">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-8">

                    @if ($blog->image)
                        <div class="blogDetailsImage">
                            <img src="{{ asset('storage/blogs/' . $blog->image) }}"
                                class="img-fluid w-100 rounded shadow mb-4">
                        </div>
                    @endif

                    <h1 class="fw-bold mb-3">

                        {{ $blog->title }}

                    </h1>

                    <div class="d-flex flex-wrap align-items-center gap-3 text-muted border-bottom pb-3 mb-4">

                        <span>

                            <i class="bi bi-calendar-event"></i>

                            {{ $blog->published_at
                                ? \Carbon\Carbon::parse($blog->published_at)->format('d M Y')
                                : $blog->created_at->format('d M Y') }}

                        </span>

                        <span>

                            <i class="bi bi-person-circle"></i>

                            {{ $blog->author_name ?? 'Admin' }}

                        </span>

                        <span>

                            <i class="bi bi-book"></i>

                            Article

                        </span>

                    </div>



                    <div class="blog-content">

                        {!! nl2br(e($blog->content)) !!}

                    </div>

                    <div class="border-top mt-5 pt-4">

                        <h5 class="mb-3">

                            Share This Article

                        </h5>

                        <a target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                            class="btn btn-primary">

                            <i class="bi bi-facebook"></i>

                            Facebook

                        </a>

                        <a target="_blank" href="https://wa.me/?text={{ urlencode(url()->current()) }}"
                            class="btn btn-success">

                            <i class="bi bi-whatsapp"></i>

                            WhatsApp

                        </a>

                        <a target="_blank"
                            href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                            class="btn btn-info">

                            <i class="bi bi-linkedin"></i>

                            LinkedIn

                        </a>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="card shadow border-0">

                        <div class="card-header bg-primary text-white">

                            <h5 class="mb-0">

                                Recent Articles

                            </h5>

                        </div>

                        <div class="card-body">

                            @foreach ($recentBlogs as $item)
                                <div class="d-flex gap-2 mb-3">

                                    @if ($item->image)
                                        <div class="letestBlogImage">
                                            <img src="{{ asset('storage/blogs/' . $item->image) }}" class="rounded">
                                        </div>
                                    @endif

                                    <div>

                                        <a href="{{ route('blog.details', $item->slug) }}" class="text-decoration-none">

                                            <strong>

                                                {{ $item->title }}

                                            </strong>

                                        </a>

                                        <br>

                                        <small class="text-muted">

                                            {{ $item->published_at
                                                ? \Carbon\Carbon::parse($item->published_at)->format('d M Y')
                                                : $item->created_at->format('d M Y') }}

                                        </small>

                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </section>

    <section class="py-5">

        <div class="container">

            <div class="bg-light rounded shadow-sm p-4 text-center">

                <h4>

                    Looking For Premium Lubricants?

                </h4>

                <p>

                    Explore our complete range of automotive and industrial lubricants.

                </p>

                <a href="{{ route('products') }}" class="btn btn-primary">

                    View Products

                </a>

            </div>

        </div>

    </section>

@endsection

@push('styles')
    <style>
        .blogDetailsImage {
            max-width: 100%;
            height: 250px;
            margin-bottom: 20px
        }

        .blogDetailsImage img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .letestBlogImage {
            width: 80px;
            height: 60px;
            overflow: hidden;
        }

        .letestBlogImage img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .breadcrumb .breadcrumb-item a {
            color: darkgreen;
            font-weight: 600;
        }
    </style>
@endpush
