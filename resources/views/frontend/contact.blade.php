@extends('frontend.layouts.master')

@section('content')
    <div class="container py-5">

        <div class="row">

            <div class="col-md-5">

                <h2>Contact Information</h2>

                <hr>

                <p>
                    <strong>Phone:</strong>
                    {{ $setting->phone }}
                </p>

                <p>
                    <strong>Email:</strong>
                    {{ $setting->email }}
                </p>

                <p>
                    <strong>Address:</strong>
                    {{ $setting->address }}
                </p>

                <p>
                    <strong>WhatsApp:</strong>
                    {{ $setting->whatsapp }}
                </p>

            </div>

            <div class="col-md-7">

                <h2>Send Message</h2>

                <hr>

                @if (session('success'))
                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>
                @endif


                @if ($errors->any())
                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}">

                    @csrf

                    <input type="text" name="name" class="form-control mb-3" placeholder="Name">

                    <input type="text" name="phone" class="form-control mb-3" placeholder="Phone">

                    <input type="email" name="email" class="form-control mb-3" placeholder="Email">

                    <input type="text" name="subject" class="form-control mb-3" placeholder="Subject">

                    <textarea name="message" rows="6" class="form-control mb-3" placeholder="Message"></textarea>

                    <button class="btn btn-primary">

                        Send Message

                    </button>

                </form>

            </div>

        </div>

    </div>
@endsection
