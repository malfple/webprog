<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome(){
        return view('home');
    }

    public function pagination(){
   		$posts = DB::table('posts') ->paginate(10);
    	return view('home.blade.php', ['posts' => $posts]);
    }
}
