<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','MenuController@retornoIndex');

Route::get('votar','MenuController@retornoVotar');

Route::get('login','MenuController@retornoLogin');

Route::get('auth/register','MenuController@retornoRegistrar');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


Route::get('user', 'UserController@user');

//Imagenes
//Route::get('user', 'UserController@profile');
Route::post('user', 'UserController@subirImagen');