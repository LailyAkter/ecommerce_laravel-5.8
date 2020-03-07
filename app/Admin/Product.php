<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable = [
       'product_name','short_desc','full_desc','image','price','tag_id','brand_id','status','real_price','sell_price','quantity'
   ];
    // public function tags()
    // {
    //     return $this->hasMany(Tag::class);
    // }

    // public function brands()
    // {
    //     return $this->hasMany(Brand::class);
    // }
}
