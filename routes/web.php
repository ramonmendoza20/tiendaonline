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

Route::get('/home', 'HomeController@index');
Route::get('logout', function(){
    Auth::logout(); // logout user
    return Redirect::to('/');
});

//RUTAS USUARIO NORMAL
Route::get('/mostarArticulo', 'ArticulosController@mostarArticulo'); //Consultar articulo


//RUTAS ADMINISTRADOR
Route::get('admin', 'AdminController@admin');
	Route::group(['prefix' => 'admin'], function () {   
	});

//Rutas para articulos, promociones
Route::get('/registroArticulo', 'AdminController@registroArticulo');
Route::post('/guardarArticulo', 'AdminController@guardarArticulo'); //Guardar articulo
Route::get('/consultarArticulo', 'AdminController@consultarArticulo'); //Consultar articulo
Route::get('/eliminarArticulo/{id}', 'AdminController@eliminar'); //Ruta para eliminar articulo
Route::get('/actualizarArticulo/{id}', 'AdminController@actualizar'); //Modifica un articulo
Route::post('/actualizar/{id}', 'AdminController@actualizarArticulo');
//Rutas para enviar promociones
Route::get('/enviarPromo/{id}','ArticulosController@enviarPromo');
Route::get('/articulos','ArticulosController@enviar');

Route::get('/consultar','ArticulosController@consultar');

Route::post('/enviarPromociones', 'ArticulosController@enviarPromociones');


//Rutas para usuarios
Route::get('/registrarUsuarios', 'AdminController@registrarUsuarios');
Route::get('/consultarUsuarios', 'AdminController@consultarUsuarios');
Route::post('/guardarUsuario', 'AdminController@guardarUsuario');
Route::get('/eliminarUsuario/{id}', 'AdminController@eliminarUsuario');	
Route::get('editarUsuarios/{id}', 'AdminController@editarUsuarios');
Route::post('actualizarUsuario/{id}', 'AdminController@actualizarUsuario');