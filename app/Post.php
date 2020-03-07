<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Admin\Tag')->withTimestamps();;
    }

    public function categories()
    {
        return $this->belongsToMany('App\Admin\Category')->withTimestamps();
    }

}
