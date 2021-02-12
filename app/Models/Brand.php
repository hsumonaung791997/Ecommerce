<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $fillable = [
        'name', 'photo'
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
