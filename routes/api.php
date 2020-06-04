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
Route::resource('publicaciones','PublicacionesController',['only' => [
    'index', 'show'
]]);
Route::resource('profesores','EscuelasProfesoresController',['only' => [
    'index', 'show'
]]);
Route::resource('banners','BannersController',['only' => [
    'index', 'show'
]]);
Route::resource('alumnos','AlumnosController',['only' => [
    'index', 'show'
]]);
Route::resource('aulas','AulasController',['only' => [
    'index', 'show'
]]);
Route::resource('admin','AdministradoresController',['only' => [
        'show','store'
]]);
Route::get('admins','AdministradoresController@index');
Route::resource('calificaciones','CalificacionesController',['only' => [
    'index', 'show'
]]);
Route::resource('escuela','EscuelasController',['only' => [
    'index', 'show'
]]);
Route::resource('escuelas_profesores','EscuelasProfesoresController',['only' => [
    'index', 'show'
]]);
Route::resource('grupos','GruposController',['only' => [
    'index', 'show'
]]);
Route::resource('grupos_materias_aulas','GruposMateriasAulasController',['only' => [
    'index', 'show'
]]);
Route::resource('materias','MateriasController',['only' => [
    'index', 'show'
]]);
Route::resource('personas','PersonasController',['only' => [
    'index', 'show'
]]);
Route::resource('profesor','ProfesoresController',['only' => [
    'index', 'show'
]]);
Route::resource('publicaciones','PublicacionesController',['only' => [
    'index', 'show'
]]);
Route::resource('tipos','TiposController',['only' => [
    'index','show'
]]);

Route::post('login', 'AdministradoresController@login');
Route::group([

    'middleware' => 'jwt.token',
    'prefix' => 'auth'

], function ($router) {
    Route::get('tipos','TiposController@index');
    Route::resource('publicaciones','PublicacionesController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('profesores','EscuelasProfesoresController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('banners','BannersController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('alumnos','AlumnosController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('aulas','AulasController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('admin','AdministradoresController',['only' => [
        'store','destroy','update'
    ]]);
    Route::get('admins','AdministradoresController@index');
    Route::resource('calificaciones','CalificacionesController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('escuela','EscuelasController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('escuelas_profesores','EscuelasProfesoresController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('grupos','GruposController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('grupos_materias_aulas','GruposMateriasAulasController',['only' => [
        'destroy','update'
    ]]);
    Route::resource('materias','MateriasController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('personas','PersonasController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('profesor','ProfesoresController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('publicaciones','PublicacionesController',['only' => [
        'store','destroy','update'
    ]]);
    Route::resource('tipos','TiposController',['only' => [
        'store','destroy','update'
    ]]);
});
