<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function showProfile(){
        if(!Auth::check())return redirect('/');
        $user = Auth::user();
        $error = "";
        return view('profilePage', compact('error','user'));
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        if(strlen($request->name) < 5){
            $error = "name must have at least 5 characters";
            return view('profilePage', compact('error','user'));
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $error = "invalid email";
            return view('profilePage', compact('error','user'));
        }
        if(User::where('email', $request->email)->where('email', '!=', $user->email)->first()){
            $error = "email already exist, pick another one";
            return view('profilePage', compact('error','user'));
        }
        if(strlen($request->password) < 8){
            $error = "password must be at least 8 characters";
            return view('profilePage', compact('error','user'));
        }
        if(!ctype_alnum($request->password)){
            $error = "password must be alphanumeric";
            return view('profilePage', compact('error','user'));
        }
        if(!$request->gender){
            $error = "select your gender";
            return view('profilePage', compact('error','user'));
        }
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->user_gender = $request->gender;
        $user->save();
        $error = "update successful";
        return view('profilePage', compact('error','user'));
    }

    public function cancelUpdate(Request $request){
        return redirect('/');
    }

    public function showManageUser(){
        if(!Auth::check())return redirect('/');
        if(Auth::user()->user_role != 'Admin')return redirect('/');
        $users = User::all();
        return view('/manageUser', compact('users'));
    }

    public function showUpdateUser($id){
        if(!Auth::check())return redirect('/');
        if(Auth::user()->user_role != 'Admin')return redirect('/');
        $user = User::where('id', $id)->first();
        $error = "";
        return view('editUser', compact('user', 'error'));
    }

    public function cancelUpdateUser(Request $request){
        return redirect('/manageUser');
    }

    public function updateUser(Request $request){
        return $request;
    }

    public function deleteUser(Request $request){
        return $request;
    }
}
