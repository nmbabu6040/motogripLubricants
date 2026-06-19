@extends('frontend.layouts.master')

@section('title', 'Media Gallery')

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h1>

                    Media Gallery

                </h1>

                <p>

                    Explore our product and company gallery.

                </p>

            </div>

            <div class="row">

                @forelse($galleries as $gallery)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">

                        <a href="{{ asset('storage/gallery/' . $gallery->image) }}" target="_blank">

                            <img src="{{ asset('storage/gallery/' . $gallery->image) }}" class="img-fluid rounded shadow-sm"
                                style="height:220px;width:100%;object-fit:cover;">

                        </a>

                    </div>

                @empty

                    <div class="col-12 text-center">

                        No Gallery Image Found

                    </div>
                @endforelse

            </div>

        </div>

    </section>

@endsection
