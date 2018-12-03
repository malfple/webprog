<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Post;

class TransactionController extends Controller
{
    public function addToCart($id){
        if(!Auth::check())return redirect('/');
        $cart = Auth::user()->cart;
        if(!$cart){
            $cart = new Cart;
            Auth::user()->cart()->save($cart);
        }

        $post = Post::where('id', $id)->first();
        $owner = $post->user;
        $category = $post->category;
        $comments = $post->comments;
        $isOwner = Auth::user()->id == $owner->id;

        $dupe = $cart->posts()->where('post_id', $id)->first();
        if($dupe){
            $error = "post already in cart";
            return view('postDetail', compact('post', 'owner', 'category', 'comments', 'error', 'isOwner'));
        }

        $cart->posts()->attach($id);
        $error = "post added to cart";
        return view('postDetail', compact('post', 'owner', 'category', 'comments', 'error', 'isOwner'));
    }

    public function showCart(){
        if(!Auth::check())return redirect('/');
        $cart = Auth::user()->cart;
        if(!$cart){
            $cart = new Cart;
            Auth::user()->cart()->save($cart);
        }
        $posts = $cart->posts;
        return view('cart', compact('posts'));
    }
}
