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

Route::post('/login','UserController@login');
Route::post('/register','UserController@register');
Route::get('/logout',function(){
	Auth::logout();
	return back();
});

/*TROCA A LINGUA*/
Route::get('/lang/{lang?}',function ($lang = null){
	Session::put('lang',$lang);
	return back();
});

Route::get('/{page?}','FrontendController@show');


//AREA DO USUARIO NORMAL
Route::group(['middleware' => 'user'],function(){
	Route::get('/point/create');	
});

//AREA DO USUARIO EMPRESA
Route::group(['middleware' => 'company'],function(){
	Route::get('/point/create');	
});