<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $videos = VideoGallery::latest()->get();

        return view(
            'admin.video-galleries.index',
            compact('videos')
        );
    }

    public function create()
    {
        return view(
            'admin.video-galleries.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|max:255',

            'youtube_url' => 'required'

        ]);

        VideoGallery::create([

            'title' => $request->title,

            'youtube_url' => $request->youtube_url,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status ?? 1

        ]);

        return redirect()
            ->route('video-galleries.index')
            ->with(
                'success',
                'Video Added Successfully'
            );
    }

    public function edit(VideoGallery $video_gallery)
    {
        return view(
            'admin.video-galleries.edit',
            compact('video_gallery')
        );
    }

    public function update(
        Request $request,
        VideoGallery $video_gallery
    ) {
        $request->validate([

            'title' => 'required|max:255',

            'youtube_url' => 'required'

        ]);

        $video_gallery->update([

            'title' => $request->title,

            'youtube_url' => $request->youtube_url,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status ?? 1

        ]);

        return redirect()
            ->route('video-galleries.index')
            ->with(
                'success',
                'Video Updated Successfully'
            );
    }

    public function destroy(VideoGallery $video_gallery)
    {
        $video_gallery->delete();

        return back()
            ->with(
                'success',
                'Video Deleted Successfully'
            );
    }
}
