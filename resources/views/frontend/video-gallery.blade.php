@extends('frontend.layouts.master')

@section('title', 'Video Gallery')

@section('content')

    <section class="py-5">


        <div class="container">

            <div class="text-center mb-5">

                <h1>

                    Video Gallery

                </h1>

                <p>

                    Watch our latest videos and product presentations.

                </p>

            </div>

            <div class="row">

                @forelse($videos as $video)
                    @php

                        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/', $video->youtube_url, $matches);

                        $videoId = $matches[1] ?? '';

                    @endphp

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card shadow h-100">

                            <iframe height="250" src="https://www.youtube.com/embed/{{ $videoId }}"
                                title="{{ $video->title }}" frameborder="0" allowfullscreen>

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

                        No Videos Found

                    </div>
                @endforelse

            </div>

        </div>


    </section>

@endsection
