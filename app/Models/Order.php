<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    //
    protected $fillable = [
        'orderdate','user_id','total','status','orderno','note',
    ];

    public function items()
    {
        return $this->belongsToMany('App\Models\Item', 'orderdetails')
                ->withPivot('qty')
                ->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
