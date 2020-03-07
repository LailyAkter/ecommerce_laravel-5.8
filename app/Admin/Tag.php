<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // public function product()
    // {
    //     return $this->belongTo(Product::class);
    // }

     public function posts()
    {
        return $this->belongToMany('App\Post')->withTimestamps();;
    }
}
