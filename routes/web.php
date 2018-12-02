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

Route::get('/login', 'LoginController@showLogin');
Route::get('/register', 'LoginController@showRegister');
Route::get('/logout', 'LoginController@doLogout');

Route::post('/doLogin', 'LoginController@doLogin');
Route::post('/doRegister', 'LoginController@doRegister');

Route::get('/testLogin/{email}/{password}', 'LoginController@testLogin');