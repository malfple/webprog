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

// --- admin section
Route::get('/manageUser', 'ProfileController@showManageUser');
Route::get('/updateUser/{id}', 'ProfileController@showUpdateUser');

Route::post('/cancelUpdateUser', 'ProfileController@cancelUpdateUser');
Route::post('/doUpdateUser', 'ProfileController@updateUser');
Route::post('/deleteUser', 'ProfileController@deleteUser');

// display posts, comments, etc + their features
Route::get('/', 'HomeController@showHome');
Route::get('/myPosts', 'HomeController@showMyPosts');

Route::get('/addPost', 'HomeController@showInsertPost');
Route::post('/doInsertPost', 'HomeController@insertPost');

Route::get('/followedPosts', 'HomeController@showFollowedPosts');

Route::get('/postDetail/{id}', 'HomeController@showPostDetail');
Route::post('/doAddComment', 'HomeController@addComment');
Route::get('/deletePost/{id}', 'HomeController@deletePost');

// category
Route::get('/manageFollowedCategories', 'CategoryController@showFollowedCategories');
Route::post('/updateFollowedCategories', 'CategoryController@updateFollowedCategories');

// --- admin section
Route::get('/manageCategories', 'CategoryController@showManageCategories');

Route::get('/updateCategory/{id}', 'CategoryController@showUpdateCategory');
Route::post('/doUpdateCategory', 'CategoryController@updateCategory');

Route::get('/deleteCategory/{id}', 'CategoryController@deleteCategory');

Route::get('/addCategory', 'CategoryController@showAddCategory');
Route::post('/doAddCategory', 'CategoryController@addCategory');

// transactions
Route::get('/cart', 'TransactionController@showCart');

Route::get('/addToCart/{id}', 'TransactionController@addToCart');
Route::get('/removeFromCart/{id}', 'TransactionController@removeFromCart');

Route::post('/checkout', 'TransactionController@checkout');

Route::get('/transactionHistory', 'TransactionController@showTransactionHistory');

Route::get('/allTransactions', 'TransactionController@showAllTransactions');

// -----  test routes  -----

// Route::get('/testLayout', function(){
//     return view('layout');
// });