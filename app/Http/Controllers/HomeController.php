<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use Validator;

class HomeController extends Controller
{
    public function showHome(){
        $posts = Post::paginate(10);
        return view('home', ['posts' => $posts]);
    }

    public function showMyPosts(){
        $posts = Auth::user()->posts()->paginate(5);
        return view('myPost', ['posts' => $posts]);
    }

    public function showInsertPost(){
        $categories = Category::all();
        $error = "";
        return view('insertPost', compact('error', 'categories'));
    }

    public function insertPost(Request $request){
        $categories = Category::all();
        if(strlen($request->title) < 20 || strlen($request->title) > 200){
            $error = "title must be between 20 and 200 characters";
            return view('insertPost', compact('error', 'categories'));
        }
        if(strlen($request->caption) < 1){
            $error = "caption must be filled";
            return view('insertPost', compact('error', 'categories'));
        }
        if(!$request->picture){
            $error = "browse file";
            return view('insertPost', compact('error', 'categories'));
        }
        $validator = Validator::make($request->all(), [
            'picture' => 'mimes:jpeg,png',
        ]);
        if($validator->fails()){
            $error = "file extension has to be .png/.jpg/.jpeg";
            return view('insertPost', compact('error', 'categories'));
        }
        if(!is_numeric($request->price)){
            $error = "price has to be integer";
            return view('insertPost', compact('error', 'categories'));
        }
        if(!$request->category){
            $error = "select a category";
            return view('insertPost', compact('error', 'categories'));
        }
        $post = new Post;
        $post->post_name = $request->title;
        $post->post_caption = $request->caption;
        $post->post_price = $request->price;
        $pic_url = $request->picture->store('public');
        $post->post_picture = substr($pic_url, 7);
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;
        $post->save();
        $error = "post added successfully";
        return view('insertPost', compact('error', 'categories'));
    }
}
