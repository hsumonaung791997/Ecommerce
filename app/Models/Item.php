<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'name','photo','codeno','price','discount','description','brand_id','subcategory_id'
    ];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'orderdetails')
                ->withPivot('qty')
                ->withTimestamps();
    }
}
