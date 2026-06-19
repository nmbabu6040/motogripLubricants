<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class FrontendGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where(
            'status',
            1
        )
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view(
            'frontend.gallery',
            compact('galleries')
        );
    }
}
