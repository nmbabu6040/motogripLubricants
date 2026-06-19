@extends('admin.layouts.app')

@section('content')
    <div class="py-4">
        <h3 class="mt-4">Add Product</h3>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label>Category</label>

                <select name="category_id" class="form-control">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ old('category_id') == $category->id ? 'selected' : '' }}

                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Sub Category</label>

                <select name="sub_category_id" class="form-control">

                    <option value="">

                        Select Sub Category

                    </option>

                    @foreach ($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}">

                            {{ old('sub_category_id') == $subCategory->id ? 'selected' : '' }}

                            {{ $subCategory->name }}

                        </option>
                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Product Name</label>

                <input type="text" name="name" class="form-control">

                @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label>Meta Title</label>

                <input type="text" name="meta_title" class="form-control">

            </div>

            <div class="mb-3">

                <label>Meta Description</label>

                <textarea id="content" name="meta_description" class="form-control" rows="3"></textarea>

            </div>

            <div class="mb-3">

                <label>Image</label>

                <input type="file" name="image" class="form-control">

            </div>

            <div class="mb-3">

                <label>Datasheet PDF</label>

                <input type="file" name="datasheet_pdf" class="form-control" accept=".pdf">

            </div>

            <div class="mb-3">

                <label>Gallery Images</label>

                <input type="file" name="gallery_images[]" multiple class="form-control">

            </div>

            <div class="mb-3">

                <label>Short Description</label>

                <textarea name="short_description" class="form-control" id="short_description">
                {!! old('short_description') !!}
            </textarea>

            </div>

            <div class="mb-3">

                <label>Description</label>

                <textarea name="description" rows="6" class="form-control" id="description">
                {!! old('description') !!}
            </textarea>


                <div class="mb-3">


                    <label class="fw-bold">

                        Product Specifications

                    </label>

                    <div id="specification-wrapper">

                        <div class="row mb-2 specification-row">

                            <div class="col-md-5">

                                <input type="text" name="spec_name[]" class="form-control"
                                    placeholder="Specification Name">

                            </div>

                            <div class="col-md-5">

                                <input type="text" name="spec_value[]" class="form-control"
                                    placeholder="Specification Value">

                            </div>

                            <div class="col-md-2">

                                <button type="button" class="btn btn-danger remove-spec">

                                    Remove

                                </button>

                            </div>

                        </div>

                    </div>

                    <button type="button" id="addSpecification" class="btn btn-primary btn-sm mt-2">

                        Add More Specification

                    </button>


                </div>


            </div>

            <div class="mb-3">

                <label>Featured Product</label>

                <select name="featured" class="form-control">

                    <option value="1">Yes</option>
                    <option value="0">No</option>

                </select>

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="1">Active</option>
                    <option value="0">Inactive</option>

                </select>

            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-success">
                    Save Product
                </button>

                <a href="{{ route('products.index') }}" class="btn btn-secondary">

                    Back

                </a>
            </div>

        </form>
    </div>
    @push('scripts')
        <script>
            document
                .getElementById('addSpecification')
                .addEventListener('click', function() {

                    let html = `
                            <div class="row mb-2 specification-row">

                                <div class="col-md-5">

                                    <input
                                        type="text"
                                        name="spec_name[]"
                                        class="form-control"
                                        placeholder="Specification Name">

                                </div>

                                <div class="col-md-5">

                                    <input
                                        type="text"
                                        name="spec_value[]"
                                        class="form-control"
                                        placeholder="Specification Value">

                                </div>

                                <div class="col-md-2">

                                    <button
                                        type="button"
                                        class="btn btn-danger remove-spec">

                                        Remove

                                    </button>

                                </div>

                            </div>
                        `;

                    document
                        .getElementById('specification-wrapper')
                        .insertAdjacentHTML(
                            'beforeend',
                            html
                        );

                });

            document.addEventListener('click', function(e) {

                if (e.target.classList.contains('remove-spec')) {

                    e.target
                        .closest('.specification-row')
                        .remove();
                }

            });
        </script>
    @endpush
@endsection
