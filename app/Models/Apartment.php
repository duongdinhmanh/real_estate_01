<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';

    protected $fillable = ['id', 'post_id', 'name', 'slug', 'address', 'desc', 'acreage', 'price', 'sale', 'image', 'video', 'detail', 'floor_plans', 'map', 'status'];

    public function ApartmentCategory()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function Images()
    {
        return $this->hasOne('App\Models\ApartmentImage', 'apartment_id', 'id');
    }

    public static function scopeGetApartments($query)
    {
        return $query->where('status', 1)->orderBy('id', 'DESC');
    }
}
