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
        return $this->hasMany('App\Models\Image');
    }
    public function url(){
        
        return route('front.feed.post.show',['post'=>$this->id]);
    }
    public function formattedDate(){
        return date('D j F g m a',strtotime((string)$this->created_at)); 
    }
}
