@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">


        <div class="d-flex justify-content-between align-items-center mb-3">

            <h3>

                Add Testimonial

            </h3>

            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">

                Back

            </a>

        </div>

        <div class="card">

            <div class="card-body">

                <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">

                            Name

                        </label>

                        <input type="text" name="name" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Designation

                        </label>

                        <input type="text" name="designation" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Photo

                        </label>

                        <input type="file" name="image" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Message

                        </label>

                        <textarea name="message" rows="5" class="form-control" required></textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Rating

                        </label>

                        <select name="rating" class="form-control">

                            <option value="5">5 Star</option>
                            <option value="4">4 Star</option>
                            <option value="3">3 Star</option>
                            <option value="2">2 Star</option>
                            <option value="1">1 Star</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Sort Order

                        </label>

                        <input type="number" name="sort_order" value="0" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select name="status" class="form-control">

                            <option value="1">

                                Active

                            </option>

                            <option value="0">

                                Inactive

                            </option>

                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">

                        Save Testimonial

                    </button>

                </form>

            </div>

        </div>


    </div>
@endsection
