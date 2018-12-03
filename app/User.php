<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    //
    public function posts(){
    	return $this->hasMany('App\Post');
    }
    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    // public function cart(){
    // 	return $this->belongsTo('App\Cart');
    // }
}
