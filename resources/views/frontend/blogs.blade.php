@extends('frontend.layouts.master')

@section('title', 'Blog')

@section('content')

    <section class="py-5">


        <div class="container">

            {{-- breadcumb start  --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
            {{-- breadcumb end  --}}

            <div class="text-center mb-5">

                <h2 class="headTitle">

                    Our Blog

                </h2>

            </div>

            <div class="row">

                @forelse($blogs as $blog)
                    <div class="col-md-4 mb-4">

                        <div class="card h-100 shadow-sm">

                            @if ($blog->image)
                                <div class="blogPageImage">
                                    <img src="{{ asset('storage/blogs/' . $blog->image) }}"
                                        class="card-img-top img-fluid w-100">
                                </div>
                            @endif

                            <div class="card-body">

                                <h5>

                                    {{ $blog->title }}

                                </h5>

                                {{-- এখানে বসবে --}}

                                <small class="text-muted">

                                    <i class="bi bi-calendar-event"></i>

                                    {{ $blog->published_at
                                        ? \Carbon\Carbon::parse($blog->published_at)->format('d M Y')
                                        : $blog->created_at->format('d M Y') }}

                                    |

                                    <i class="bi bi-person"></i>

                                    {{ $blog->author_name ?? 'Admin' }}

                                </small>

                                <p>

                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}

                                </p>

                            </div>

                            <div class="card-footer bg-white">

                                <a href="{{ route('blog.details', $blog->slug) }}" class="btn btn-primary">

                                    Read More

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">

                        No Blogs Found

                    </div>
                @endforelse

            </div>

            <div class="mt-4">

                {{ $blogs->links() }}

            </div>

        </div>


    </section>

@endsection

@push('styles')
    <style>
        .blogPageImage {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .blogPageImage img {
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
