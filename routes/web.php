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

Route::get('/', 'PageController@homepage');

Route::get('/jadwal', 'PageController@jadwalpage');

Route::get('/nama url', function(){
    return 'kalimat';
});

/*Route::get('/hehe', 'PageController@index'){
	return view('jadwal');
}*/