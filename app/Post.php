<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    // Only when needed => carts()
    // Only when needed => transactions()
}
