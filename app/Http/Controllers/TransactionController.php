<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function showCart(){
        if(!Auth::check())return redirect('/');
        return view('cart');
    }
}
