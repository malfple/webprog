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
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function cart(){
        return $this->hasOne('App\Cart');
    }
    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
