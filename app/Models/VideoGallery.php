<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    protected $fillable = [

        'title',
        'youtube_url',
        'sort_order',
        'status'

    ];
}
