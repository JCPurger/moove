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

//ROTA DE AUTENTICACAO
Auth::routes();

Route::get('/','FrontendController@index');

/*ROTA DE TROCA DE LINGUA*/
Route::get('/lang/{lang?}',function ($lang = null){
    Session::put('lang',$lang);
    return back();
});

//API PLACES
Route::post('/places','PlacesController@apiAllPlaces')->name('postAllPlaces');
Route::get('/places','PlacesController@apiAllPlaces');


//AREA DO USUARIO NORMAL
Route::group(['middleware' => 'user'],function(){
	Route::get('/point/create');
});

//AREA DO USUARIO EMPRESA
Route::group(['middleware' => 'company'],function(){
	Route::get('/point/create');
});

Route::get('/details','FrontendController@create');

//ROTA PARA PAGINAS GENERICAS (NA PAGINA TEMP)
Route::get('/{page?}','FrontendController@show');