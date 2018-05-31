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
Route::get('/servicecheck','SecurityController@check');
Route::get('/servicelogout','SecurityController@logout');

Route::group(['middleware' => 'auth_josso'], function() {
	Route::get('/', "IndexController@index");
	Route::get("/angket/{calon_penerima_id}", "AngketController@index");
	Route::post("/angket/save", "AngketController@simpan");
	Route::post("/angket/update", "AngketController@update");
	Route::get("/foto/{calon_penerima_id}", "FotoController@index");
	Route::post("/foto/save", "FotoController@simpan");
	Route::post("/foto/update", "FotoController@update");
	
});