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

//Route::get('/', 'PageController@homepage');

Route::get('/', 'PageController@homepage');
Route::get('/schedule', 'PageController@jadwalpage');
Route::get('/contact','PageController@contactpage');
Route::get('/bookHere', 'PageController@bookinghere');
Route::post('/bookHere/create','TableController@storePeminjamBooking');
Route::get('/confirm','PageController@confirm');
Route::post('/confirm/check','TableController@awalUploadSurjin');
Route::get('/confirm/upload','PageController@upload');
Route::post('/confirm/upload/check','TableController@uploadSurjin');
//Route::get('/hehe', function(){
//    return view('welcome');
//});



Auth::routes();
Route::get('/register',function(){
	return redirect('/');
});
Route::get('/home', 'HomeController@index')->name('home');

//In booking list
Route::get('/bookedList','HomeController@accepting');
Route::get('/pic', function($id){
	return view('huhu');
});
Route::post('/verify/{id}','TableController@acceptBooking');

//To Change My Password
Route::get('/changePassword','HomeController@showChangePassword');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

//schedule admin
Route::get('/scheduleAdmin', 'HomeController@jadwaladminpage');


//What Master Role Can Do
Route::group(['middleware' => ['auth', 'master']], function() {
    Route::get('/admin','HomeController@adminpage');
    Route::get('/addAdmin','HomeController@tambahadminpage');
    Route::post('/addAdmin/create','TableController@storeUser');
    Route::get('/deleteAdmin','TableController@destroyUser');

});

Route::get('/logout', 'Auth.LoginController@logout');

