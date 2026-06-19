<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Product;

class FrontendSubCategoryController extends Controller
{
    public function show($slug)
    {
        $subCategory = SubCategory::where(
            'slug',
            $slug
        )->firstOrFail();

        $products = Product::where(
            'sub_category_id',
            $subCategory->id
        )
            ->where('status', 1)
            ->latest()
            ->paginate(12);

        return view(
            'frontend.subcategory-products',
            compact(
                'subCategory',
                'products'
            )
        );
    }
}
