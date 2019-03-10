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

$routes = function($prefix) {
    Route::get('/',['uses' => 'pub\Pagecontroller@particular' , 'as' => 'particular']);
};

Route::group(['prefix' => 'particular'], $routes);
Route::group(['prefix' => 'profesional'], $routes);
Route::get('{path}/productos',['uses' => 'pub\Pagecontroller@productos' , 'as' => 'productos']);
Route::get('{path}/productos/{tipo}',['uses' => 'pub\Pagecontroller@tipo' , 'as' => 'tipo']);
Route::get('{path}/empresa',['uses' => 'pub\Pagecontroller@empresa' , 'as' => 'empresa']);
Route::get('{path}/aplicacion',['uses' => 'pub\Pagecontroller@aplicacion' , 'as' => 'aplicacion']);
Route::get('{path}/trabajos',['uses' => 'pub\Pagecontroller@trabajos' , 'as' => 'trabajos']);
Route::get('{path}/preguntas',['uses' => 'pub\Pagecontroller@preguntas' , 'as' => 'preguntas']);
Route::get('{path}/ventajas',['uses' => 'pub\Pagecontroller@ventajas' , 'as' => 'ventajas']);
Route::get('{path}/distribuidores',['uses' => 'pub\Pagecontroller@distribuidores' , 'as' => 'distribuidores']);
Route::get('{path}/contacto',['uses' => 'pub\Pagecontroller@contacto' , 'as' => 'contacto']);


Route::group(['middleware' => 'auth', 'prefix' => 'adm'], function() {
    Route::get('/', 'admController@index');

    Route::get('data/{tipo}/{id}', ['uses' => 'adm\PageController@data' , 'as' => 'data']);
    Route::get('erase/{tipo}/{id}', ['uses' => 'adm\PageController@erase' , 'as' => 'erase']);
    Route::post('titulo', ['uses' => 'adm\PageController@titulo' , 'as' => 'titulo']);
    Route::post('editdata', ['uses' => 'adm\PageController@editdata' , 'as' => 'editdata']);
    Route::post('adddata', ['uses' => 'adm\PageController@adddata' , 'as' => 'adddata']);
    Route::post('adddataempresa', ['uses' => 'adm\PageController@adddataempresa' , 'as' => 'adddataempresa']);
    
    Route::post('admempresa', ['uses' => 'adm\EmpresaController@data', 'as' => 'admempresa']);
    Route::get('admempresa', ['uses' => 'adm\EmpresaController@datos', 'as' => 'admempresa']);
    Route::post('datatable', ['uses' => 'adm\EmpresaController@datatable', 'as' => 'datatable']);

    Route::get('logout', ['uses' => 'Auth\LoginController@logout' , 'as' => 'adm.logout']);
    Route::get('metadatos',['uses' => 'adm\MetadatosController@index', 'as' => 'metadatos']);
    Route::get('page/{seccion}', ['uses' => 'adm\PageController@edit', 'as' => 'page']);
    Route::get('buscar/{tipo}/{id}', ['uses' => 'adm\PageController@search', 'as' => 'buscar']);
    Route::get('producto/{tipo}', ['uses' => 'adm\ProductoController@edit', 'as' => 'producto']);
    Route::resource('aplicacion', 'adm\AplicacionController');
    Route::get('add/{seccion}', ['uses' => 'adm\AddController@index', 'as' => 'add']);

    Route::group(['prefix' => 'slider', 'as' => 'slider'], function() {
        Route::get('{seccion}/edit', ['uses' => 'adm\SlidersController@edit', 'as' => '.edit']);
    });
    // ['uses' => 'adm\PageController@edit', 'as' => '.edit']
    
    // Route::resource('page', 'adm\AplicacionController');
});