<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
class Image extends Model
{
    //
    public function post(){
        return $this->belongsTo('App\Models\Post');
    }

    public function imageUrl(){
        return Storage::url($this->url);
    }
}
