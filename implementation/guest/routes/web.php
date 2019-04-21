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



// search for available room
Route::get('/reservation', 'RoomController@search')->middleware('auth');
Route::post('/reservation', 'RoomController@search');

// create a booking
Route::post('/newBooking', 'BookingController@newBooking');

// view all stays of a customer
Route::get('/MyBookings', 'BookingController@searchUser');

// cancel a booking by user
Route::delete('/booking/delete/{id}','BookingController@destroy');
// curently staying guests
Route::get('/stayingGuest', 'BookingController@CurentlyStaying');
// viewing orders made by a guest
Route::post('/orders','orderItemController@index');
// view user menu
Route::get('/menu', 'MenuItemController@index');
// view admin menu
Route::get('/adminMenu', 'MenuItemController@adminMenu');

// view aboutus page
Route::get('/aboutUs', function () {
    return view('system.aboutus');
});
// view contactus page
Route::get('/contactUs','MessagesController@index');
// place order
Route::post('/placeOrders','orderItemController@create');
// view orders
Route::get('/myorders', 'orderItemController@viewOrders');

// generate new bill
Route::post('/bill', 'FinalBillController@store');


// view bill of their specific booking
Route::post('/viewbill', 'FinalBillController@show');

// view all curently booked data
Route::get('/curentlyBooked', 'BookingController@CurentlyBooked');

// makeCheckinOf a user
Route::post('/booking/checkIn/{id}','BookingController@CheckIn');

// admin cancels a booking
Route::delete('/booking/adminDelete/{id}','BookingController@admindestroy');

// admin delets a menu item
Route::delete('/menu/delete/{id}','MenuItemController@destroy');

// view all customers to admin
Route::get('/users', 'UserController@index');

//view all old stays to the admin
Route::get('/checkedOut', 'BookingController@checkedOut');

// view bill to admin of old stays
Route::post('/viewbillAdmin', 'FinalBillController@showAdmin');


// open add item form
Route::get('/itemForm', 'MenuItemController@create');

// add new items in menu
Route::Post('/itemForm', 'MenuItemController@store');

// update price on menu
Route::Post('/menu/edit/{id}','MenuItemController@edit');

// send message
Route::Post('/message','MessagesController@store');

// show new messages to admin
Route::get('/newMessages','MessagesController@show');

// change message status to read
Route::Post('/markRead/{id}','MessagesController@edit');

// delete messages
Route::delete('/messages/delete/{id}','MessagesController@destroy');

// show old messages to admin
Route::get('/oldMessages','MessagesController@showOld');

// change message status to read
Route::Post('/markRead/{id}','MessagesController@edit');








