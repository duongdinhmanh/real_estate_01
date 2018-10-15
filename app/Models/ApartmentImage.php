<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApartmentImage extends Model
{
    protected $table = 'apartment_images';

    public function Apartment()
    {
        return $this->hasMany('App\Models\Apartment', 'apartment_id', 'id');
    }
}
