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

Route::get('votar','VotoController@getVotar');
Route::post('votar','VotoController@gestionarVoto');

Route::get('login','MenuController@retornoLogin');

Route::get('auth/register','MenuController@retornoRegistrar');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');



Route::get('homeUser','UserController@homeUser');
Route::post('homeUser','UserController@subirFotoPerfil');


Route::get('user', 'UserController@vistaSubirFotos');
Route::post('user', 'UserController@subirImagen');
Route::get('misFotos', 'UserController@vistaMisFotos');


/* 
	Si el usuario es administrador mostramos una vista de lo contrario lo 
	expulsamos redireccionándolo a la página raiz.
*/



Route::group(['middleware' =>  ['auth', 'isAdmin']], function() {
  	Route::post('adminCategorias','AdminController@gestionarCategorias');
	Route::post('adminFotos', 'AdminController@gestionarFotos');
	Route::post('adminAdministradores', 'AdminController@gestionarUsuarios');

	Route::get('admin', 'AdminController@mostrarAdmin');
	 Route::get('estadisticas', 'AdminController@estadisticas');


	Route::get('adminCategorias','AdminController@devuelveCategorias');
	Route::get('adminFotos', 'AdminController@devuelveFotos');
	Route::get('adminAdministradores', 'AdminController@devuelveUsuarios');

	Route::get('adminGestionarCategoria', 'AdminController@gestionCategoria');


	Route::get('adminListadoFotografias', 'AdminController@listadoFotos');
	Route::post('adminListadoFotografias', 'AdminController@devuelvelistadoFotos');  

	Route::post('adminModificarCategorias','AdminController@modificarCategorias');

  
});


