<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [

        'title',
        'subtitle',
        'image',

        'button_text_1',
        'button_link_1',

        'button_text_2',
        'button_link_2',

        'sort_order',
        'status'

    ];
}
