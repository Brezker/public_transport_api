<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParadaController;
use App\Http\Controllers\citaController;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\UnidadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [login_controller::class, 'login']);

Route::get('/paradas', [ParadaController::class, 'list']);
Route::post('/parada', [ParadaController::class, 'save']);
Route::post('/parada/delete', [ParadaController::class, 'delete']);


//Rutas "ruta"
//Ruta para guardar o  actualizar
Route::post('/ruta', [RutaController::class, 'save']);
//Ruta para buscar
Route::get('/rutas', [RutaController::class, 'list']);
//Ruta para eliminar
Route::post('/ruta/delete', [RutaController::class, 'delete']);

//Rutas para "unidad"
//Ruta para guardar o actualizar
Route::post('/unidad', [UnidadController::class, 'save']);
//Ruta para buscar
Route::get('/unidades', [UnidadController::class, 'list']);
//Ruta para eliminar
Route::post('/unidad/delete', [UnidadController::class, "delete"]);

//Ruta para listar las unidades en false
Route::get('/unidades/parada', [UnidadController::class, 'listFalse']);
Route::get('/unidades/base', [UnidadController::class, 'listTrue']);

Route::get('/unidades/pasajero/{id_para}', [UnidadController::class, 'listParadasbyId']);
