@extends('frontend.layouts.master')

@section('content')
    <div class="container py-5">

        <h2 class="mb-4">

            Become A Dealer

        </h2>

        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif

        <form method="POST" action="{{ route('dealer.inquiry.store') }}">

            @csrf

            <input type="text" name="name" class="form-control mb-3" placeholder="Name">

            <input type="text" name="company" class="form-control mb-3" placeholder="Company Name">

            <input type="text" name="phone" class="form-control mb-3" placeholder="Phone">

            <input type="email" name="email" class="form-control mb-3" placeholder="Email">

            <input type="text" name="city" class="form-control mb-3" placeholder="City">

            <textarea name="message" class="form-control mb-3" rows="5" placeholder="Message"></textarea>

            <button class="btn btn-primary">

                Submit Inquiry

            </button>

        </form>

    </div>
@endsection
