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
Route::get('noticia/registar', 'NoticiaController@registrarNoticia');
Route::get('noticia/nueva/categoria', 'NoticiaController@indexCategoria');
Route::resource('categoria', 'CategoriaController');
Route::resource('unidad-academica', 'UnidadAcademicaController');

Route::get('noticia/fotos', 'NoticiaController@registrarFotos');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
