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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'guest'], function(){
	Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword');
	Route::post('/forgot-password', 'ForgotPasswordController@postForgotPassword');
});

Route::get('/home', 'HomeController@index');
Route::resource('usuarios', 'UsuariosController');
Route::resource('comunidades', 'ComunidadesController');
Route::resource('edificios', 'EdificiosController');
Route::resource('unidades', 'UnidadesController');
Route::resource('gastocomun', 'GastoComunController');

/* Usuarios
Route::group(['prefix' => 'usuarios'], function(){
	
}); 
 

//Comunidades
Route::group(['prefix' => 'comunidades'], function(){
	
});


//Edificios
Route::group(['prefix' => 'edificios'], function(){
	
});


//Unidades
Route::group(['prefix' => 'unidades'], function(){
	
});
*/