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
Route::get('/bookHere', 'PageController@bookinghere');
Route::post('/bookHere/create','TableController@storePeminjam');
Route::get('/', function(){
    return view('welcome');
});


/*Route::get('/hehe', 'PageController@index'){
	return view('jadwal');
}*/


Auth::routes();
/*Route::get('/register',function(){
	return redirect('/main');
});*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accepting','HomeController@accepting');
Route::get('/changePassword','HomeController@showChangePassword');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::group(['middleware' => ['auth', 'master']], function() {
    Route::get('/admin','HomeController@adminpage');
    Route::get('/addAdmin','HomeController@tambahadminpage');
    Route::post('/addAdmin/create','TableController@storeUser');
    /*terkait crud admin*/
    Route::get('/deleteAdmin','TableController@destroyUser');

});

Route::get('/logout', 'Auth.LoginController@logout');

