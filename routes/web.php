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
    return redirect('/login');
});
Route::resource('noticia', 'NoticiaController');
Route::get('noticia/fotos/{id}', 'NoticiaController@ShowPhoto');
Route::get('error', 'ErrorController@index');
Route::put('noticia/fotos/{id}', 'NoticiaController@UpdatePhoto');
Route::resource('slider', 'SliderController');
Route::resource('persona', 'PersonaController');
Route::resource('documento', 'DocumentoController');
Route::resource('categoria-documento', 'CategoriaDocumentoController');
Route::resource('categoria', 'CategoriaController');
Route::resource('categoria-proyecto', 'CategoriaProyectoController');
Route::resource('estado-proyecto', 'EstadoProyectoController');
Route::resource('proyecto', 'ProyectoController');
Route::resource('filosofia', 'FilosofiaController');
Route::resource('enlace', 'EnlaceController');
Route::resource('evento', 'EventosController');
Route::resource('servicio', 'ServicioController');
Route::resource('redes-sociales', 'RedesSocialesController');
Route::resource('unidad-academica', 'UnidadAcademicaController');
//error
Route::get('not-found','ErrorController@pagenotfound');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

//Rutas Plantillas
Route::get('micrositio/{micrositio}', 'InglesController@index');
Route::get('micrositio/{micrositio}/nosotros', 'NosotrosController@index');
Route::get('micrositio/{micrositio}/servicios/{id}/', 'ServiciosController@index');
Route::get('micrositio/{micrositio}/noticia/{id}/', 'NoticiaPlantillaController@index');
Route::get('micrositio/{micrositio}/proyectos/{id}/', 'ProyectosPlantillaController@index');
Route::get('micrositio/{micrositio}/proyectos-categoria/{id}/', 'ProyectosPlantillaController@proyectoCategoria');
Route::get('micrositio/{micrositio}/noticia-categoria/{id}/', 'NoticiaPlantillaController@noticiaCategoria');
