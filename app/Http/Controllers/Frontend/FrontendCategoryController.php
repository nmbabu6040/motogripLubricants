<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;


class FrontendCategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where(
            'slug',
            $slug
        )->firstOrFail();

        $products = Product::where(
            'category_id',
            $category->id
        )
            ->where('status', 1)
            ->latest()
            ->paginate(12);

        $categories = \App\Models\Category::where(
            'status',
            1
        )
            ->orderBy('sort_order')
            ->get();

        $subCategories = $category->subCategories()
            ->withCount('products')
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        return view(
            'frontend.category-products',
            compact(
                'category',
                'products',
                'categories',
                'subCategories'
            )
        );
    }
}
