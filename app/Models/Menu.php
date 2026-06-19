<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [

        'title',
        'url',
        'parent_id',
        'sort_order',
        'status'

    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')
            ->where('status', 1)
            ->orderBy('sort_order');
    }
}
