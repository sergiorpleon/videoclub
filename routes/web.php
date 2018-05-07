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

#Route::get('/', function () {
#    return view('home');
#});
Route::get('/', 'HomeController@getHome');

Route::get('/hola', function () {
    return '¡Hola mundo!';;
});

Route::get('/hola/{nombre}', function ($nombre) {
    return view('hola',array('nombre'=>$nombre));
});


Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout');
// Rutas para registro...
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');
// Rutas para resset password...
#Route::get('auth/register', 'Auth\ResetPasswordController@showResetForm');
#Route::post('auth/register', 'Auth\ResetPasswordController@reset');



Route::get('catalog', 'CatalogController@getIndex');

Route::get('catalog/show/{id}', 'CatalogController@getShow');

Route::group(['middleware' => 'auth'], function()
{    
Route::match(array('GET', 'POST'),'catalog/create', 'CatalogController@getCreate');

Route::match(array('GET', 'POST'),'catalog/edit/{id}', 'CatalogController@putEdit');

Route::get('catalog/return/{id}', 'CatalogController@getReturn');

});


