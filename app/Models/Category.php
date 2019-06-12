<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
class Category extends Model
{
    //
    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }
    public function url(){
        
        return route('front.feed.category.posts',['category'=>$this->id]);
    }
    public function imageUrl(){
        return Storage::url($this->image);

    }
}
