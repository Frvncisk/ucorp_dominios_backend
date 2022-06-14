<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TblUsuarioController;
use App\Http\Controllers\TblServicioController;
use App\Http\Controllers\TblComputadoresController;
use App\Http\Controllers\TblServiciosLapsoController;
use App\Http\Controllers\TblTiposDeServicioController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

// Route::get('todos', [TodoController::class , 'index' ] )->middleware('can:todo.index');
// Route::post('todo', [TodoController::class , 'store' ] )->middleware('can:todo.index');

// Route::controller(TodoController::class)->group(function () {
//     Route::get('todos', 'index')->middleware('can:todo.index');
//     Route::post('todo', 'store');
//     Route::get('todo/{id}', 'show');
//     Route::put('todo/{id}', 'update');
//     Route::delete('todo/{id}', 'destroy')->middleware('can:todo.delete');
// });

Route::controller(TblUsuarioController::class)->group(function () {
    Route::get('usuarios', 'index')->middleware('can:usuario.index');
    // Route::get('usuario', 'create')->middleware('can:usuario.create');
    Route::post('usuario', 'store')->middleware('can:usuario.store');
    Route::get('usuario/{id}', 'show')->middleware('can:usuario.show');;
    Route::put('usuario/{id}', 'update')->middleware('can:usuario.update');;
    Route::delete('usuario/{id}', 'destroy')->middleware('can:usuario.delete');
});

Route::controller(TblServicioController::class)->group(function () {
    Route::get('servicios', 'index')->middleware('can:servicio.index');
    Route::post('servicio', 'store')->middleware('can:servicio.store');
    Route::get('servicio_data/', 'data');//->middleware('can:servicio.data');
    Route::get('servicio/{id}', 'show');//->middleware('can:servicio.show');
    Route::put('servicio/{id}', 'update')->middleware('can:servicio.update');
    Route::delete('servicio/{id}', 'destroy');//->middleware('can:servicio.destroy');
});

Route::controller(TblTiposDeServicioController::class)->group(function () {
    Route::get('tipos_servicios', 'index')->middleware('can:tipo_servicio.index');
    Route::post('tipo_servicio', 'store')->middleware('can:tipo_servicio.store');
    // Route::post('tipo_servicio/data', 'data')->middleware('can:tipo_servicio.data');
    Route::get('tipo_servicio/{id}', 'show')->middleware('can:tipo_servicio.show');
    Route::put('tipo_servicio/{id}', 'update')->middleware('can:tipo_servicio.update');
    Route::delete('tipo_servicio/{id}', 'destroy')->middleware('can:tipo_servicio.destroy');
});

Route::controller(TblServiciosLapsoController::class)->group(function () {
    Route::get('lapsos_servicios', 'index')->middleware('can:lapso_servicio.index');
    Route::post('lapso_servicio', 'store')->middleware('can:lapso_servicio.store');
    Route::get('lapso_servicio_data/', 'data')->middleware('can:lapso_servicio.data');
    Route::get('lapso_servicio/{id}', 'show')->middleware('can:lapso_servicio.show');
    Route::put('lapso_servicio/{id}', 'update')->middleware('can:lapso_servicio.update');
    Route::delete('lapso_servicio/{id}', 'destroy')->middleware('can:lapso_servicio.destroy');
});

Route::controller(TblComputadoresController::class)->group(function () {
    Route::get('computadores', 'index')->middleware('can:computador.index');
    Route::post('computador', 'store')->middleware('can:computador.store');
    Route::get('computadores_data/', 'data')->middleware('can:computador.data');
    Route::get('computador/{id}', 'show')->middleware('can:computador.show');
    Route::put('computador/{id}', 'update')->middleware('can:computador.update');
    Route::delete('computador/{id}', 'destroy')->middleware('can:computador.destroy');
});
