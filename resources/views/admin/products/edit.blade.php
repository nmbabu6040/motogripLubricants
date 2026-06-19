@extends('admin.layouts.app')

@section('content')

    <div class="py-4">
        <h3 class="mt-4">Edit Product</h3>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">


            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Image</label>

                @if ($product->image)
                    <div class="mb-3">

                        <img src="{{ asset('storage/products/' . $product->image) }}" width="120" class="img-thumbnail">

                    </div>
                @endif

                <input type="file" name="image" class="form-control">

                <small class="text-muted">
                    Leave empty to keep current image.
                </small>

            </div>

            <div class="mb-3">

                <label>Datasheet PDF</label>

                @if ($product->datasheet_pdf)
                    <div class="mb-2">

                        <a href="{{ asset('storage/products/' . $product->datasheet_pdf) }}" target="_blank"
                            class="btn btn-sm btn-success">

                            View Current PDF

                        </a>

                    </div>
                @endif

                <input type="file" name="datasheet_pdf" class="form-control" accept=".pdf">

                <small class="text-muted">

                    Leave empty to keep current PDF

                </small>

            </div>



            @if ($product->images->count())
                <div class="mb-4">

                    <label class="fw-bold mb-3 d-block">

                        Current Gallery Images

                    </label>

                    <div class="row">

                        @foreach ($product->images as $image)
                            <div class="col-md-2 text-center mb-3">

                                <img src="{{ asset('storage/products/gallery/' . $image->image) }}"
                                    class="img-fluid border rounded mb-2">

                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteGallery{{ $image->id }}">

                                    Delete

                                </button>

                            </div>
                        @endforeach

                    </div>

                </div>
            @endif


            <div class="mb-3">

                <label>Add More Gallery Images</label>

                <input type="file" name="gallery_images[]" multiple class="form-control">

            </div>

            <div class="mb-3">

                <label>Product Name</label>

                <input type="text" name="name" class="form-control" value="{{ $product->name }}">

                @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label>Meta Title</label>

                <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control">

            </div>

            <div class="mb-3">

                <label>Meta Description</label>

                <textarea name="meta_description" class="form-control" rows="3">{{ $product->meta_description }}</textarea>

            </div>

            <div class="mb-3">

                <label>Category</label>

                <select name="category_id" class="form-control">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>

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
                        <option value="{{ $subCategory->id }}"
                            {{ $product->sub_category_id == $subCategory->id ? 'selected' : '' }}>

                            {{ $subCategory->name }}

                        </option>
                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Short Description</label>

                <textarea name="short_description" rows="3" class="form-control">{{ $product->short_description }}</textarea>

            </div>

            <div class="mb-3">

                <label>Description</label>

                <textarea name="description" rows="6" class="form-control">{{ $product->description }}</textarea>

                <div class="mb-3">


                    <label class="fw-bold">

                        Product Specifications

                    </label>

                    <div id="specification-wrapper">

                        @foreach ($product->specifications as $spec)
                            <div class="row mb-2 specification-row">

                                <div class="col-md-5">

                                    <input type="text" name="spec_name[]" value="{{ $spec->spec_name }}"
                                        class="form-control">

                                </div>

                                <div class="col-md-5">

                                    <input type="text" name="spec_value[]" value="{{ $spec->spec_value }}"
                                        class="form-control">

                                </div>

                                <div class="col-md-2">

                                    <button type="button" class="btn btn-danger remove-spec">

                                        Remove

                                    </button>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    <button type="button" id="addSpecification" class="btn btn-primary btn-sm mt-2">

                        Add More Specification

                    </button>


                </div>

            </div>

            <div class="mb-3">

                <label>Featured Product</label>

                <select name="featured" class="form-control">

                    <option value="1" {{ $product->featured == 1 ? 'selected' : '' }}>

                        Yes

                    </option>

                    <option value="0" {{ $product->featured == 0 ? 'selected' : '' }}>

                        No

                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>

                        Active

                    </option>

                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>

                        Inactive

                    </option>

                </select>

            </div>

            <div class="d-flex gap-2">

                <button type="submit" class="btn btn-success">

                    Save Product

                </button>

                <a href="{{ route('products.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </div>


        </form>



        @foreach ($product->images as $image)
            <div class="modal fade" id="deleteGallery{{ $image->id }}" tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-header">

                            <h5 class="modal-title">

                                Delete Gallery Image

                            </h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>

                        </div>

                        <div class="modal-body">

                            Are you sure you want to delete this image?

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                                Cancel

                            </button>

                            <form action="{{ route('products.gallery.delete', $image) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>
        @endforeach
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
