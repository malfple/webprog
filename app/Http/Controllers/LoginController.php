<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function showLogin(){
        if(Auth::check())return 'already logged in';
        $error = "";
        return view('loginForm', compact('error'));
    }

    public function showRegister(){
        $error = "";
        return view('registerForm', compact('error'));
    }

    public function doLogin(Request $request){
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        //return $user;

        if($user){
            Auth::login($user);
            return 'yey';
        }
        $error = 'email and Password does not match';
        return view('loginForm', compact('error'));
    }

    public function doRegister(Request $request){
        if(strlen($request->name) < 5){
            $error = "name must have at least 5 characters";
            return view('registerForm', compact('error'));
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $error = "invalid email";
            return view('registerForm', compact('error'));
        }
        if(User::where('email', $request->email)->first()){
            $error = "email already exist, pick another one";
            return view('registerForm', compact('error'));
        }
        if(strlen($request->password) < 8){
            $error = "password must be at least 8 characters";
            return view('registerForm', compact('error'));
        }
        if(!ctype_alnum($request->password)){
            $error = "password must be alphanumeric";
            return view('registerForm', compact('error'));
        }
        if($request->password != $request->confirmPassword){
            $error = "confirm password must be same as password";
            return view('registerForm', compact('error'));
        }
        if(!$request->gender){
            $error = "select your gender";
            return view('registerForm', compact('error'));
        }
        $validator = Validator::make($request->all(), [
            'picture' => 'mimes:jpeg,png',
        ]);
        if($validator->fails()){
            $error = "file extension has to be .png/.jpg/.jpeg";
            return view('registerForm', compact('error'));
        }
        $user = new User;
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->user_role = 'Member';
        $user->user_gender = $request->gender;
        $user->user_picture = $request->picture->store('public');
        $user->save();
        return $user;
    }

    public function doLogout(){
        Auth::logout();
        return redirect('/');
    }
}
