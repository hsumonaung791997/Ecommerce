<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'photo'
    ];

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function items()
    {
        return $this->hasManyThrough('App\Models\Item', 'App\Models\Subcategory');
    }
}
