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
    return view("welcome");
});

Route::get('login','Auth\LoginController@showLoginForm')->name('login');

Route::post('login','Auth\LoginController@login');


Route::group(['middleware' => 'auth', 'prefix' => 'adm'], function() {
    Route::get('/', 'admController@index');

    Route::get('data/{tipo}/{id}', ['uses' => 'adm\PageController@data' , 'as' => 'data']);
    Route::post('titulo', ['uses' => 'adm\PageController@titulo' , 'as' => 'titulo']);
    Route::post('editdata', ['uses' => 'adm\PageController@editdata' , 'as' => 'editdata']);
    Route::post('adddata', ['uses' => 'adm\PageController@adddata' , 'as' => 'adddata']);

    Route::get('logout', ['uses' => 'Auth\LoginController@logout' , 'as' => 'adm.logout']);
    Route::get('empresa',['uses' => 'adm\EmpresaController@index', 'as' => 'empresa']);
    Route::get('metadatos',['uses' => 'adm\MetadatosController@index', 'as' => 'metadatos']);
    Route::get('page/{seccion}', ['uses' => 'adm\PageController@edit', 'as' => 'page']);
    Route::get('producto/{tipo}', ['uses' => 'adm\ProductoController@edit', 'as' => 'producto']);
    Route::get('productos',['uses' => 'adm\ProductosController@index', 'as' => 'productos']);
    Route::resource('aplicacion', 'adm\AplicacionController');
    Route::get('add/{seccion}', ['uses' => 'adm\AddController@index', 'as' => 'add']);

    Route::group(['prefix' => 'slider', 'as' => 'slider'], function() {
        Route::get('{seccion}/create', ['uses' => 'adm\SlidersController@create', 'as' => '.create']);
        Route::get('{seccion}/edit', ['uses' => 'adm\SlidersController@edit', 'as' => '.edit']);
    });
    // ['uses' => 'adm\PageController@edit', 'as' => '.edit']
    
    // Route::resource('page', 'adm\AplicacionController');
});