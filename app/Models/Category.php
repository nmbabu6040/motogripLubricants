<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'sort_order',
        'status'
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class)
            ->where('status', 1)
            ->orderBy('sort_order');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
