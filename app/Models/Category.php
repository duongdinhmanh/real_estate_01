<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function childs()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'category_id', 'id');
    }

    //scope result with parent_id = 0;
    public function scopeParentCategory($query)
    {
        return $query->where('parent_id', '=', 0);
    }
}
