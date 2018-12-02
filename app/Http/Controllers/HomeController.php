<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function showHome(){
        $posts = Post::paginate(10);
        return view('home', ['posts' => $posts]);
    }
}
