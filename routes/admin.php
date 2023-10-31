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
use App\Http\Controllers\Admin\FondoProvicionalController;
use App\Http\Controllers\Admin\GestionCobranzaController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RegistrarPagoController;
use App\Http\Controllers\Admin\RegistrarPagoLibreController;
use App\Http\Controllers\Admin\SolicitudesController;
use App\Http\Controllers\Admin\ValidacionesController;

Route::get('', [HomeController::class, 'index'])->name('admin.index');

//Prestamos
Route::resource('/prestamos', PrestamosController::class)->names('admin.prestamos');
Route::resource('/prestamos/registrar-pago', RegistrarPagoController::class)->names('admin.registrarpago');
Route::resource('/prestamos/registrar-pago-libre', RegistrarPagoLibreController::class)->names('admin.registrarpagolibre');
Route::resource('/prestamos/gestion-cobranza', GestionCobranzaController::class)->names('admin.gestioncobranza');

//Clientes
Route::resource('/clientes', ClientesController::class)->names('admin.clientes');
Route::resource('/zona', ZonasController::class)->names('admin.zonas');
Route::post('/validar-dni', 'App\Http\Controllers\Admin\ValidacionesController@validarDNI')->name('validar-dni');
Route::post('/validar-zona', 'App\Http\Controllers\Admin\ValidacionesController@validarZona')->name('validar-zona');
Route::post('/validar-tipozona', 'App\Http\Controllers\Admin\ValidacionesController@validarTipoZona')->name('validar-tipozona');

//Simulador
Route::resource('/simulador', SimuladorController::class)->names('admin.simulador');

//Solicitudes
Route::resource('/solicitudes', SolicitudesController::class)->names('admin.solicitudes');
Route::resource('/solicitudes/fondo-provicional', FondoProvicionalController::class)->names('admin.fondosprovicionales');

//Usuarios
Route::resource('/usuarios', UsuariosController::class)->middleware('can:admin.usuarios.index')->names('admin.usuarios');

//Sucursales
Route::resource('/sucursales', SucursalesController::class)->names('admin.sucursales');

//Cuentas
Route::resource('/cuentas', CuentasController::class)->names('admin.cuentas');

//Perfil
Route::resource('/perfil', ProfileController::class)->names('admin.perfil');