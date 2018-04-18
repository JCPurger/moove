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

//ROTA DE TROCA DE LINGUA
Route::get('/lang/{lang?}',function ($lang = null){
    Session::put('lang',$lang);
    return back();
});

//API PLACES
Route::post('/places/api/getAll','PlacesController@apiAllPlaces')->name('postAllPlaces');
Route::get('/places/api/getAll','PlacesController@apiAllPlaces');//TODO: remover esse despois dos testes

//Route::rousource('/places','PlacesController');
Route::get('/places','PlacesController@index')->name('listPlaces');
Route::get('/places/show/{id}','PlacesController@show')->name('detailsPlace');
Route::get('/places/create','PlacesController@create')->name('createPlace');
Route::post('/places/store','PlacesController@store')->name('storePlace');

Route::get('/profile/edit/{id}','UserProfileController@edit')->name('editProfile');
Route::post('/profile/update/{id}','UserProfileController@update')->name('updateProfile');

Route::get('/favorites/{id}','FavoriteController@index')->name('listFavorites');

//AREA DO USUARIO NORMAL
Route::group(['middleware' => 'user'],function(){
	Route::get('/point/create');
});

//AREA DO USUARIO EMPRESA
Route::group(['middleware' => 'company'],function(){
	Route::get('/point/create');
});

//ROTA PARA PAGINAS GENERICAS (NA PAGINA TEMP)
Route::get('/{page?}','FrontendController@show');