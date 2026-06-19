<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'name',
        'slug',
        'image',
        'short_description',
        'description',
        'featured',
        'meta_title',
        'meta_description',
        'datasheet_pdf',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images()
    {
        return $this->hasMany(
            ProductImage::class
        );
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function inquiries()
    {
        return $this->hasMany(ProductInquiry::class);
    }
}
