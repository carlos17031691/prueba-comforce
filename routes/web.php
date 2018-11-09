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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/procesos', 'HomeController@procesos')->name('procesos');
Route::get('/procesos/crear', 'HomeController@crear_proceso')->name('crear_proceso');
Route::get('/', 'HomeController@index')->name('home');
Route::post('/procesos/registrar','HomeController@registrar_proceso')->name('registrar_proceso');
Route::get('/procesos/detalle/{numero}', 'HomeController@detalle_proceso')->name('detalle_proceso');
Route::get('/procesos/editar/{numero}', 'HomeController@editar_proceso')->name('editar_proceso');
Route::post('/procesos/actualizar', 'HomeController@actualizar_proceso')->name('actualizar_proceso');