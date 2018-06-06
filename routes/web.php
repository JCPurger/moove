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
Route::get('/', 'FrontendController@index');
Route::get('/lang/{lang?}','FrontendController@changeLang');

//AREA DO USUARIO NORMAL
Route::group(['middleware' => ['user', 'auth']], function () {
    //USER - FAVORITES
    Route::get('/favorites/toggle/{id}', 'FavoriteController@toggleFavorite');
    Route::post('/favorites/toggle', 'FavoriteController@toggleFavorite');
    Route::resource('/favorites', 'FavoriteController');
});

//AREA DO USUARIO EMPRESA
Route::group(['middleware' => ['company', 'auth']], function () {
    Route::resource('/places', 'PlacesController', ['except' => 'show']);
});

//PROFILE
Route::get('/profile/edit', 'UserProfileController@edit')->name('editProfile');
Route::post('/profile/update', 'UserProfileController@update')->name('updateProfile');

//API E PUBLIC PLACES
Route::post('/places/api/getAll', 'PlacesController@apiBuscaLugares')->name('postAllPlaces');
Route::get('/api/test', 'PlacesController@apiBuscaLugares');//TODO: remover esse despois dos testes
Route::get('/places/{id}', 'PlacesController@show')->name('detailsPlace');

//ROTA PARA PAGINAS GENERICAS (NA PAGINA TEMP)
Route::get('/{page?}', 'FrontendController@show');