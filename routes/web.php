<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@showHome');
Route::get('/myPosts', 'HomeController@showMyPosts');


Route::get('/login', 'LoginController@showLogin');
Route::get('/register', 'LoginController@showRegister');
Route::get('/logout', 'LoginController@doLogout');

Route::post('/doLogin', 'LoginController@doLogin');
Route::post('/doRegister', 'LoginController@doRegister');

Route::get('/profile', 'ProfileController@showProfile');
Route::post('/updateProfile', 'ProfileController@updateProfile');
Route::post('/cancelUpdateProfile', function(){
    return redirect('/');
});


Route::get('/addPost', 'HomeController@showInsertPost');
Route::post('/doInsertPost', 'HomeController@insertPost');

// Route::get('/testLogin/{email}/{password}', 'LoginController@testLogin');

Route::get('/testLayout', function(){
    return view('layout');
});

Route::get('/insertPost', function(){
    return view('insertPost');
});

Route::get('/transactionHistory', function(){
    return view('transactionHistory');
});

Route::get('/postDetail', function(){
    return view('postDetail');
});