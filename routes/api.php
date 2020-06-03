<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------

| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('/publicaciones','PublicacionesController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('/profesores','EscuelasProfesoresController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('/banners','BannersController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('alumnos','AlumnosController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('aulas','AulasController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('admin','AdministradoresController',['only' => [
        'show','store','destroy','update'
]]);
Route::get('admins','AdministradoresController@index');
Route::resource('calificaciones','CalificacionesController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('escuela','EscuelasController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('escuelas_profesores','EscuelasProfesoresController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('grupos','GruposController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('grupos_materias_aulas','GruposMateriasAulasController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('materias','MateriasController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('personas','PersonasController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('profesor','ProfesoresController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('publicaciones','PublicacionesController',['only' => [
    'index', 'show','store','destroy','update'
]]);
Route::resource('tipos','TiposController',['only' => [
    'index', 'show','store','destroy','update'
]]);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
