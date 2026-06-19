<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use App\Models\ProductSpecification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'category',
            'subCategory'
        ])->latest()->get();

        return view(
            'admin.products.index',
            compact('products')
        );
    }

    public function create()
    {
        $categories = Category::where(
            'status',
            1
        )->get();

        $subCategories = SubCategory::where(
            'status',
            1
        )->get();

        return view(
            'admin.products.create',
            compact(
                'categories',
                'subCategories'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'datasheet_pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        // slug store part
        $slug = Str::slug($request->name);
        $exists = Product::where(
            'slug',
            $slug
        )->exists();

        if ($exists) {
            $slug .= '-' . time();
        }

        // image upload and store
        $imageName = null;
        if ($request->hasFile('image')) {

            $imageName = time() . '.' .
                $request->image->extension();

            $request->image->storeAs(
                'products',
                $imageName,
                'public'
            );
        }

        // pdf upload and store
        $pdfName = null;
        if ($request->hasFile('datasheet_pdf')) {

            $pdfName =
                time() .
                '_datasheet.' .
                $request->datasheet_pdf->extension();

            $request->datasheet_pdf->storeAs(
                'products',
                $pdfName,
                'public'
            );
        }

        // product stroe part
        $product = Product::create([

            'category_id' => $request->category_id,

            'sub_category_id' => $request->sub_category_id,

            'name' => $request->name,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,

            'slug' => $slug,

            'image' => $imageName,

            'datasheet_pdf' => $pdfName,

            'short_description' => $request->short_description,

            'description' => $request->description,

            'featured' => $request->featured ?? 0,

            'status' => $request->status ?? 1,

        ]);

        // gallery image store
        if ($request->hasFile('gallery_images')) {

            foreach ($request->file('gallery_images') as $image) {

                $galleryImageName =
                    uniqid() .
                    '.' .
                    $image->extension();

                $image->storeAs(
                    'products/gallery',
                    $galleryImageName,
                    'public'
                );

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $galleryImageName
                ]);
            }
        }

        // specification store
        if ($request->spec_name) {

            foreach ($request->spec_name as $key => $specName) {

                if (!empty($specName)) {

                    ProductSpecification::create([

                        'product_id' => $product->id,

                        'spec_name' => $specName,

                        'spec_value' => $request->spec_value[$key] ?? ''

                    ]);
                }
            }
        }

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Product Created Successfully'
            );
    }

    public function edit(Product $product)
    {
        $product->load([
            'images',
            'specifications'
        ]);

        $categories = Category::all();

        $subCategories = SubCategory::where(
            'status',
            1
        )->get();

        return view(
            'admin.products.edit',
            compact(
                'product',
                'categories',
                'subCategories'
            )
        );
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'datasheet_pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        // slug create with name
        $slug = Str::slug($request->name);
        $exists = Product::where(
            'slug',
            $slug
        )
            ->where(
                'id',
                '!=',
                $product->id
            )
            ->exists();

        if ($exists) {
            $slug .= '-' . time();
        }

        // image upload and update
        $imageName = $product->image;
        if ($request->hasFile('image')) {

            if ($product->image) {

                Storage::disk('public')->delete(
                    'products/' . $product->image
                );
            }

            $imageName =
                time() . '.' .
                $request->image->extension();

            $request->image->storeAs(
                'products',
                $imageName,
                'public'
            );
        }


        // pdf upload and update
        $pdfName = $product->datasheet_pdf;
        if ($request->hasFile('datasheet_pdf')) {

            if ($product->datasheet_pdf) {

                Storage::disk('public')->delete(
                    'products/' . $product->datasheet_pdf
                );
            }

            $pdfName =
                time() .
                '_datasheet.' .
                $request->datasheet_pdf->extension();

            $request->datasheet_pdf->storeAs(
                'products',
                $pdfName,
                'public'
            );
        }

        // total product update sec
        $product->update([

            'category_id' => $request->category_id,

            'sub_category_id' => $request->sub_category_id,

            'name' => $request->name,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,

            'slug' => $slug,

            'image' => $imageName,

            'datasheet_pdf' => $pdfName,

            'short_description' => $request->short_description,

            'description' => $request->description,

            'featured' => $request->featured ?? 0,

            'status' => $request->status ?? 1,

        ]);


        // product specification update
        $product->specifications()->delete();
        if ($request->spec_name) {

            foreach ($request->spec_name as $key => $specName) {

                if (!empty($specName)) {

                    ProductSpecification::create([

                        'product_id' => $product->id,

                        'spec_name' => $specName,

                        'spec_value' => $request->spec_value[$key] ?? ''

                    ]);
                }
            }
        }

        // product gallery image update
        if ($request->hasFile('gallery_images')) {

            foreach ($request->file('gallery_images') as $image) {

                $galleryImageName =
                    uniqid() .
                    '.' .
                    $image->extension();

                $image->storeAs(
                    'products/gallery',
                    $galleryImageName,
                    'public'
                );

                ProductImage::create([

                    'product_id' => $product->id,

                    'image' => $galleryImageName

                ]);
            }
        }

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Updated Successfully'
            );
    }

    public function deleteGalleryImage(ProductImage $image)
    {
        Storage::disk('public')->delete(
            'products/gallery/' . $image->image
        );

        $image->delete();

        return back()->with(
            'success',
            'Gallery Image Deleted Successfully'
        );
    }



    public function destroy(Product $product)
    {
        if ($product->image) {

            Storage::disk('public')->delete(
                'products/' . $product->image
            );
        }

        if ($product->datasheet_pdf) {

            Storage::disk('public')->delete(
                'products/' . $product->datasheet_pdf
            );
        }

        foreach ($product->images as $image) {

            Storage::disk('public')->delete(
                'products/gallery/' . $image->image
            );

            $image->delete();
        }

        $product->specifications()->delete();

        $product->delete();

        return back()->with(
            'success',
            'Deleted Successfully'
        );
    }
}
