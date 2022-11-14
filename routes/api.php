<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('proyectos','ProyectoController');
Route::get('proyectos','App\Http\Controllers\ProyectoController@listaProyectos');
Route::get('proyectos/ciudad/{id}','App\Http\Controllers\ProyectoController@proyectosPorCiudad');
Route::get('proyectos/categoria/{id}','App\Http\Controllers\ProyectoController@proyectosPorCategoria');
Route::get('proyectos/{id}','App\Http\Controllers\ProyectoController@proyectoPorId');
Route::get('proyectos/departamento/{id}','App\Http\Controllers\ProyectoController@proyectosPorDepartamento');
Route::post('interesados','App\Http\Controllers\InteresadoController@store');