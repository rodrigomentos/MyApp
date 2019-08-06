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
Route::get('/personas','PersonaController@index');
Route::get('/persona/nuevo','PersonaController@nuevo');
Route::get('/persona/editar/{personaId}','PersonaController@editar');

Route::post('/persona/registrar','PersonaController@registrar')->name('registrarPersona');
Route::post('/persona/actualizar/{personaId}','PersonaController@actualizar')->name('actualizarPersona');
Route::post('/persona/eliminar/{personaId}','PersonaController@eliminar')->name('eliminarPersona');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
