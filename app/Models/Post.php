<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function images(){
        return $this->belongsTo('App\Models\Image');
    }
}
