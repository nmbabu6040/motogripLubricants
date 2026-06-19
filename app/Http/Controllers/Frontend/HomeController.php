<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Slider;
use App\Models\Setting;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\VideoGallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('featured', 1)->where('status', 1)->latest()->take(8)->get();
        $categories = Category::where('status', 1)->get();
        $sliders = Slider::where('status', 1)->orderBy('sort_order')->get();
        $latestBlogs = Blog::where('status', 1)->latest()->take(3)->get();
        $faqs = Faq::where('status', 1)->orderBy('sort_order')->take(5)->get();
        $galleryImages = Gallery::where('status', 1)->orderBy('sort_order')->take(8)->get();
        $latestVideos = VideoGallery::where('status', 1)->latest()->take(3)->get();
        $testimonials = Testimonial::where('status', 1)->orderBy('sort_order')->take(6)->get();
        $setting = Setting::first();

        return view('frontend.home', compact(
            'featuredProducts',
            'categories',
            'sliders',
            'latestBlogs',
            'faqs',
            'galleryImages',
            'latestVideos',
            'testimonials',
            'setting'
        ));
    }

    public function products(Request $request)
    {
        $query = Product::where('status', 1);

        if ($request->category) {

            $query->where(
                'category_id',
                $request->category
            );
        }

        if ($request->sub_category) {

            $query->where(
                'sub_category_id',
                $request->sub_category
            );
        }

        // search bar part
        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'name',
                    'like',
                    '%' . $request->search . '%'
                )

                    ->orWhere(
                        'short_description',
                        'like',
                        '%' . $request->search . '%'
                    )

                    ->orWhere(
                        'description',
                        'like',
                        '%' . $request->search . '%'
                    );
            });
        }

        $products = $query
            ->latest()
            ->paginate(12);

        $categories = Category::where(
            'status',
            1
        )->get();

        $subCategories = SubCategory::where(
            'status',
            1
        )->get();

        return view(
            'frontend.products',
            compact(
                'products',
                'categories',
                'subCategories'
            )
        );
    }

    public function productDetails($slug)
    {
        $product = Product::with([
            'category',
            'subCategory',
            'images',
            'specifications'
        ])
            ->where('slug', $slug)
            ->firstOrFail();



        $relatedProducts = Product::where(
            'sub_category_id',
            $product->sub_category_id
        )
            ->where('status', 1)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();

        if ($relatedProducts->count() < 4) {

            $relatedProducts = Product::where(
                'category_id',
                $product->category_id
            )
                ->where('status', 1)
                ->where('id', '!=', $product->id)
                ->latest()
                ->take(4)
                ->get();
        }

        return view(
            'frontend.product-details',
            compact(
                'product',
                'relatedProducts',
            )
        );
    }

    public function about()
    {
        $setting = Setting::first();

        return view(
            'frontend.about',
            compact('setting')
        );
    }
}
