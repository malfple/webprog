<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function showLogin(){
        if(Auth::check())return 'already logged in';
        return view('loginForm');
    }

    public function showRegister(){
        return view('registerForm');
    }

    public function doLogin(Request $request){
        $user = User::where('user_name', $request->user_name)->where('password', $request->password)->first();
        //return $user;

        if($user){
            Auth::login($user);
            return 'yey';
        }
        return 'failed to login';
    }

    public function forceLoginAdmin(){
        $user = User::where('user_name', 'admin')->first();
        Auth::login($user);
        return Auth::user();
    }

    public function testLogin($email, $password){
        $credentials = [
            'user_name' => $email,
            'password' => $password,
        ];

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return 'yey';
        }
        return redirect('/');
    }

    public function doLogout(){
        Auth::logout();
        return redirect('/');
    }

    public function test(){
        $user = new User;
        $user->user_name = 'admin';
        $user->password = 'admin';
        $user->user_role = 'admin';
        $user->user_gender = 'male';
        $user->user_picture = '';
        $user->save();
        return 'test';
    }
}
