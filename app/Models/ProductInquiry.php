<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInquiry extends Model
{
    protected $fillable = [

        'product_id',
        'name',
        'phone',
        'email',
        'message',
        'status'

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
