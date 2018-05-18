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

Auth::routes();

Route::get('/','FrontendController@index');

//ROTA DE TROCA DE LINGUA
Route::get('/lang/{lang?}',function ($lang = null){
    Session::put('lang',$lang);
    return back();
});

//API PLACES
Route::post('/places/api/getAll','PlacesController@apiAllPlaces')->name('postAllPlaces');
Route::get('/places/api/getAll','PlacesController@apiAllPlaces');//TODO: remover esse despois dos testes
Route::get('/places/{id}','PlacesController@show')->name('detailsPlace');

Route::get('/profile/edit/{id}','UserProfileController@edit')->name('editProfile');
Route::post('/profile/update/{id}','UserProfileController@update')->name('updateProfile');


Route::get('/favorites/toggle/{id}','FavoriteController@toggleFavorite');
Route::post('/favorites/toggle','FavoriteController@toggleFavorite');
Route::get('/favorites/delete/{id}','FavoriteController@destroy');
Route::resource('/favorites','FavoriteController');

//AREA DO USUARIO NORMAL
Route::group(['middleware' => ['user','auth']],function() {
	Route::get('/point/create');
});

//AREA DO USUARIO EMPRESA
Route::group(['middleware' => ['company','auth']],function() {
    Route::resource('/places','PlacesController');
});

//ROTA PARA PAGINAS GENERICAS (NA PAGINA TEMP)
Route::get('/{page?}','FrontendController@show');