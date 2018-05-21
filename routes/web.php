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

Route::get('/main', 'PageController@homepage');
Route::get('/schedule', 'PageController@jadwalpage');
Route::get('/contact','PageController@contactpage');
Route::get('/bookhere', 'PageController@bookinghere');
Route::get('/', function(){
    return view('welcome');
});

/*Route::get('/hehe', 'PageController@index'){
	return view('jadwal');
}*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
