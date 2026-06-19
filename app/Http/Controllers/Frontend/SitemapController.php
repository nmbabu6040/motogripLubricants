<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Blog;

class SitemapController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->get();
        $blogs = Blog::where('status', 1)->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $xml .= '<url><loc>' . url('/') . '</loc></url>';
        $xml .= '<url><loc>' . route('about') . '</loc></url>';
        $xml .= '<url><loc>' . route('products') . '</loc></url>';
        $xml .= '<url><loc>' . route('blogs') . '</loc></url>';
        $xml .= '<url><loc>' . route('contact') . '</loc></url>';

        foreach ($products as $product) {
            $xml .= '<url><loc>'
                . route('product.details', $product->slug)
                . '</loc></url>';
        }

        foreach ($blogs as $blog) {
            $xml .= '<url><loc>'
                . route('blog.details', $blog->slug)
                . '</loc></url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}
