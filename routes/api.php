<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GastoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
route::get('categorias',         [CategoriaController::class,'categorias']);
route::post('store',             [GastoController::class,'store']);
route::get('gastosCategoria',    [GastoController::class,'gastosCategoria']);
route::get('buscar',             [GastoController::class,'buscar']);
