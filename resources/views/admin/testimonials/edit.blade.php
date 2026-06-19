@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">


        <div class="d-flex justify-content-between align-items-center mb-3">

            <h3>

                Edit Testimonial

            </h3>

            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">

                Back

            </a>

        </div>

        <div class="card">

            <div class="card-body">

                <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">

                            Name

                        </label>

                        <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Designation

                        </label>

                        <input type="text" name="designation" class="form-control"
                            value="{{ $testimonial->designation }}">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Current Photo

                        </label>

                        <br>

                        @if ($testimonial->image)
                            <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}" width="120"
                                class="mb-2">
                        @endif

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Change Photo

                        </label>

                        <input type="file" name="image" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Message

                        </label>

                        <textarea name="message" rows="5" class="form-control" required>{{ $testimonial->message }}</textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Rating

                        </label>

                        <select name="rating" class="form-control">

                            @for ($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ $testimonial->rating == $i ? 'selected' : '' }}>

                                    {{ $i }} Star

                                </option>
                            @endfor

                        </select>
                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Sort Order

                        </label>

                        <input type="number" name="sort_order" class="form-control" value="{{ $testimonial->sort_order }}">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select name="status" class="form-control">

                            <option value="1" {{ $testimonial->status == 1 ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="0" {{ $testimonial->status == 0 ? 'selected' : '' }}>

                                Inactive

                            </option>

                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">

                        Update Testimonial

                    </button>

                </form>

            </div>

        </div>


    </div>
@endsection
