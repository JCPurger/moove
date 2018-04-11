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

Auth::routes();

Route::get('/','FrontendController@index');
Route::post('/places','FrontendController@create');
Route::get('/places','FrontendController@create');

/*ROTA DE TROCA DE LINGUA*/
Route::get('/lang/{lang?}',function ($lang = null){
	Session::put('lang',$lang);
	return back();
});

//AREA DO USUARIO NORMAL
Route::group(['middleware' => 'user'],function(){
	Route::get('/point/create');
});

//AREA DO USUARIO EMPRESA
Route::group(['middleware' => 'company'],function(){
	Route::get('/point/create');
});

//ROTA PARA PAGINAS GENERICAS
Route::get('/{page?}','FrontendController@show');

Route::get('/home', 'HomeController@index')->name('home');
