<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    // GET
    // show profile page view for current logged in user
    public function showProfile(){
        if(!Auth::check())return redirect('/');
        $user = Auth::user();
        $error = "";
        return view('profilePage', compact('error','user'));
    }

    // POST
    // validates user data, if accepted -> data is updated
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

    // POST
    // cancels update and redirect to home. what an unimportant function :/
    // but you know, routes need to be clean, so redirects are put here ;)
    public function cancelUpdate(Request $request){
        return redirect('/');
    }

    // GET
    // show manage user form
    public function showManageUser(){
        if(!Auth::check())return redirect('/');
        if(Auth::user()->user_role != 'Admin')return redirect('/');
        $users = User::all();
        return view('/manageUser', compact('users'));
    }

    // GET
    // show user detail form
    public function showUpdateUser($id){
        if(!Auth::check())return redirect('/');
        if(Auth::user()->user_role != 'Admin')return redirect('/');
        $user = User::where('id', $id)->first();
        $error = "";
        return view('editUser', compact('user', 'error'));
    }

    // POST
    // another redirect function
    public function cancelUpdateUser(Request $request){
        return redirect('/manageUser');
    }

    // POST
    // validates user data, and update if accepted
    public function updateUser(Request $request){
        $user = User::where('id', $request->id)->first();
        if(strlen($request->name) < 5){
            $error = "name must have at least 5 characters";
            return view('editUser', compact('user', 'error'));
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $error = "invalid email";
            return view('editUser', compact('user', 'error'));
        }
        if(User::where('email', $request->email)->where('email', '!=', $user->email)->first()){
            $error = "email already exist, pick another one";
            return view('editUser', compact('user', 'error'));
        }
        // there is no option to not choose gender, so no validation
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->user_gender = $request->gender;
        $user->save();
        $error = "update successful";
        return view('editUser', compact('user', 'error'));
    }

    // POST
    // < deactivated >
    // deletes user
    public function deleteUser(Request $request){
        $user = User::where('id', $request->id)->first();
        // $user->delete();
        // uncomment the above line to enable delete
        return redirect('/manageUser');
    }
}
