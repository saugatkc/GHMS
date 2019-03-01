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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/contactUs', function () {
    return view('contactus');
});
Route::get('/aboutUs', function () {
    return view('aboutus');
});
Route::get('/reservation', function () {
    return view('reservation');
});
Route::get('/logout', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/editProfile/{id}', function () {
    return view('editProfile');
});


Route::post('addUser', 'UserController@store'); //store
Route::get('indexx', 'UserController@store'); //create
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminDash', 'UserController@admin');
