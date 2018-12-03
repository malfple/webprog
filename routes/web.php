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

// authentication
Route::get('/login', 'LoginController@showLogin');
Route::get('/register', 'LoginController@showRegister');
Route::get('/logout', 'LoginController@doLogout');

Route::post('/doLogin', 'LoginController@doLogin');
Route::post('/doRegister', 'LoginController@doRegister');

// profiles
Route::get('/profile', 'ProfileController@showProfile');
Route::post('/updateProfile', 'ProfileController@updateProfile');
Route::post('/cancelUpdateProfile', 'ProfileController@cancelUpdate');

// display posts, comments, etc + their features
Route::get('/', 'HomeController@showHome');
Route::get('/myPosts', 'HomeController@showMyPosts');

Route::get('/addPost', 'HomeController@showInsertPost');
Route::post('/doInsertPost', 'HomeController@insertPost');

Route::get('/followedPosts', 'HomeController@showFollowedPosts');

Route::get('/postDetail/{id}', 'HomeController@showPostDetail');
Route::post('/doAddComment', 'HomeController@addComment');

// transactions
Route::get('/cart', 'TransactionController@showCart');

// Route::get('/testLogin/{email}/{password}', 'LoginController@testLogin');

// -----  test routes  -----

Route::get('/testLayout', function(){
    return view('layout');
});

Route::get('/testTransactionHistory', function(){
    return view('transactionHistory');
});

Route::get('/testProfilePage', function(){
    return view('profilePage');
});

Route::get('/testCart', function(){
    return view('cart');
});

Route::get('/testDetail', function(){
    return view('postDetail');
});

Route::get('/testFollowCat', function(){
    return view('followedCategories');
});

Route::get('/testManageUser', function(){
    return view('manageUser');
});

Route::get('/testManageCat', function(){
    return view('manageCategories');
});