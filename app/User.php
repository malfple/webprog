<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function posts(){
    	return $this->hasMany('App\Post');
    }

    public function cart(){
    	return $this->belongsTo('App\Cart');
    }
}
