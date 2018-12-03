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
Route::get('/deletePost/{id}', 'HomeController@deletePost');

// transactions
Route::get('/cart', 'TransactionController@showCart');

Route::get('/addToCart/{id}', 'TransactionController@addToCart');
Route::get('/removeFromCart/{id}', 'TransactionController@removeFromCart');

Route::post('/checkout', 'TransactionController@checkout');

Route::get('/transactionHistory', 'TransactionController@showTransactionHistory');

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

Route::get('/testFollowCat', function(){
    return view('followedCategories');
});

Route::get('/testManageUser', function(){
    return view('manageUser');
});

Route::get('/testManageCat', function(){
    return view('manageCategories');
});

Route::get('/testInsert', function(){
    return view('insertCategory');
});

Route::get('/testUpdate', function(){
    return view('updateCategory');
});