<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\JugadoresController as JugadoresV1;
use App\Http\Controllers\Api\V1\VideojuegoController as VideojuegoV1;
use App\Http\Controllers\Api\V1\CategoriaController as CategoriaV1;
use App\Http\Controllers\Api\V1\InsgrupaleController as InsgrupaleV1;
use App\Http\Controllers\Api\V1\EquipoController as EquipoV1;
use App\Http\Controllers\Api\V1\AulaController as AulaV1;
use App\Http\Controllers\Api\V1\EventoController as EventoV1;
use App\Http\Controllers\Api\V1\HorarioController as HorarioV1;
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

Route::apiResource('v1/jugadores', JugadoresV1::class)
      ->only(['index','show', 'destroy'])
      ->middleware('auth:sanctum');

Route::apiResource('v1/videojuegos', VideojuegoV1::class)
      ->only(['index','show', 'destroy'])
      ->middleware('auth:sanctum');

Route::apiResource('v1/categorias', CategoriaV1::class)
      ->only(['index','show', 'destroy'])
      ->middleware('auth:sanctum');

Route::apiResource('v1/insgrupales', InsgrupaleV1::class)
      ->only(['index','show', 'destroy'])
      ->middleware('auth:sanctum');

Route::apiResource('v1/equipos', EquipoV1::class)
      ->only(['index','show', 'destroy'])
      ->middleware('auth:sanctum');

Route::apiResource('v1/aulas', AulaV1::class)
      ->only(['index','show', 'destroy'])
      ->middleware('auth:sanctum');

Route::apiResource('v1/eventos', EventoV1::class)
      ->only(['index','show', 'destroy'])
      ->middleware('auth:sanctum');

Route::apiResource('v1/horarios', HorarioV1::class)
      ->only(['index','show', 'destroy'])
      ->middleware('auth:sanctum');
Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);
