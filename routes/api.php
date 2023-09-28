<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DepartamentoController;
use App\Http\Controllers\API\ProvinciaController;
use App\Http\Controllers\API\DistritoController;

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

Route::get('departamento/{departamento}/provincias', [DepartamentoController::class, 'provincias'])->name('api.consulta.provincia');
Route::get('provincia/{provincia}/distritos', [ProvinciaController::class, 'distritos'])->name('api.consulta.distrito');
Route::get('distrito/{distrito}/zonas', [DistritoController::class, 'zonas'])->name('api.consulta.zonas');