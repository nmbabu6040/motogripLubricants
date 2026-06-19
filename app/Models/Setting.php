<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'company_name',
        'brand_name',
        'logo',
        'favicon',
        'catalog_pdf',
        'phone',
        'email',
        'whatsapp',
        'address',
        'about_short',
        'facebook',
        'linkedin',
        'youtube',
        'instagram',
        'copyright',
        'about_image',
        'mission',
        'vision',
        'mission_image',
        'vision_image',
        'chairman_name',
        'chairman_designation',
        'chairman_image',
        'chairman_message',
    ];
}
