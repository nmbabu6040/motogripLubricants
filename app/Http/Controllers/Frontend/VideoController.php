<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;

class VideoController extends Controller
{
    public function index()
    {
        $videos = VideoGallery::where(
            'status',
            1
        )
            ->orderBy(
                'sort_order'
            )
            ->latest()
            ->get();

        return view(
            'frontend.video-gallery',
            compact('videos')
        );
    }
}
