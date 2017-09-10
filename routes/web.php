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

Use Illuminate\Http\Request;

Route::get('/lang/{lang?}',function ($lang = null){
	Session::put('lang',$lang);
	return back();
});

Route::post('/login','UserController@store');

Route::get('/{page?}','FrontendController@show');