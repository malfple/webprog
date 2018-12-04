<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Post;
use App\Transaction;

class TransactionController extends Controller
{
    // GET
    // show cart view
    public function showCart(){
        if(!Auth::check())return redirect('/');
        $cart = Auth::user()->cart;
        if(!$cart){
            $cart = new Cart;
            Auth::user()->cart()->save($cart);
        }
        $posts = $cart->posts;
        $total_price = 0;
        foreach($posts as $post)$total_price += $post->post_price;
        return view('cart', compact('posts', 'total_price'));
    }

    // GET
    // adds item by id to cart
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

    // GET
    // removes item by id from cart
    public function removeFromCart($id){
        if(!Auth::check())return redirect('/');
        $cart = Auth::user()->cart;
        if(!$cart){
            $cart = new Cart;
            Auth::user()->cart()->save($cart);
        }

        $cart->posts()->detach($id);
        return redirect('/cart');
    }

    // POST
    // checkout cart -> information moved to transaction history
    public function checkout(Request $request){
        $cart = Auth::user()->cart;
        $posts = $cart->posts;
        if($posts->count() < 1)return redirect('/cart');

        $transaction = new Transaction;
        $transaction->transaction_date = now();
        $transaction->total_price = 0;
        Auth::user()->transactions()->save($transaction);

        foreach($posts as $post){
            $cart->posts()->detach($post->id);
            $transaction->posts()->attach($post->id);
            $transaction->total_price += $post->post_price;
        }
        $transaction->save();
        return redirect('/cart');
    }

    // GET
    // shows transaction history view
    public function showTransactionHistory(){
        if(!Auth::check())return redirect('/');
        $transactions = Auth::user()->transactions;
        return view('transactionHistory', compact('transactions'));
    }

    // GET
    // shows all transaction view
    public function showAllTransactions(){
        if(!Auth::check())return redirect('/');
        if(Auth::user()->user_role != 'Admin')return redirect('/');
        $transactions = Transaction::all();
        return view('viewAllTransaction', compact('transactions'));
    }
}
