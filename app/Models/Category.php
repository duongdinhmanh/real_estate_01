<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function CategoryApartment()
    {
        return $this->belongsToMany('App\Models\Apartment');
    }

    public static function scopeGetCategories($query)
    {
        return $query->where('status', 1)->where('parent_id', 0);
    }
}
