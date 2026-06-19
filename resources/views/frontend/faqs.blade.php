@extends('frontend.layouts.master')

@section('title', 'Frequently Asked Questions')

@section('content')

    <section class="py-5">


        <div class="container">

            {{-- breadchumb start  --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                </ol>
            </nav>
            {{-- breadchumb end  --}}

            <div class="text-center mb-5">

                <h1>

                    Frequently Asked Questions

                </h1>

                <p>

                    Find answers to common questions about our products and services.

                </p>

            </div>

            <div class="accordion" id="faqAccordion">

                @forelse($faqs as $faq)
                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">

                                {{ $faq->question }}

                            </button>

                        </h2>

                        <div id="faq{{ $faq->id }}"
                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                            data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                {!! nl2br(e($faq->answer)) !!}

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="alert alert-info">

                        No FAQ Available

                    </div>
                @endforelse

            </div>

        </div>


    </section>

@endsection

@push('styles')
    <style>
        .breadcrumb .breadcrumb-item a {
            color: darkgreen;
            font-weight: 600;
        }
    </style>
@endpush
