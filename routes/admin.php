<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PrestamosController;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\ZonasController;
use App\Http\Controllers\Admin\SimuladorController;
use App\Http\Controllers\Admin\SucursalesController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\Admin\CuentasController;

Route::get('', [HomeController::class, 'index'])->name('admin.index');

//Prestamos
Route::resource('/prestamos', PrestamosController::class)->names('admin.prestamos');

//Clientes
Route::resource('/clientes', ClientesController::class)->names('admin.clientes');
Route::resource('/zona', ZonasController::class)->names('admin.zonas');

//Simulador
Route::resource('/simulador', SimuladorController::class)->names('admin.simulador');

//Sucursales
Route::resource('/sucursales', SucursalesController::class)->names('admin.sucursales');

//Usuarios
Route::resource('/usuarios', UsuariosController::class)->middleware('can:admin.usuarios.index')->names('admin.usuarios');

//Cuentas
Route::resource('/cuentas', CuentasController::class)->names('admin.cuentas');