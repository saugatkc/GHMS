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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// open add room form
Route::get('/room', 'RoomController@index');

// add a room
Route::post('room', 'RoomController@store');

// view rooms
Route::get('/roomDetails', 'RoomController@showRooms');

// delete room
Route::delete('/rooms/delete/{roomNo}','RoomController@destroy');

// view edit form
Route::get('room/edit/{id}', 'RoomController@edit'); //edit
Route::put('room/{id}', 'RoomController@update'); //update