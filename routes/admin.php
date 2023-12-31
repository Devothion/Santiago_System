<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PrestamosController;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\CompromisosController;
use App\Http\Controllers\Admin\ZonasController;
use App\Http\Controllers\Admin\SimuladorController;
use App\Http\Controllers\Admin\SucursalesController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\Admin\CuentasController;
use App\Http\Controllers\Admin\FondoProvicionalController;
use App\Http\Controllers\Admin\GestionCobranzaController;
use App\Http\Controllers\Admin\GestionesController;
use App\Http\Controllers\Admin\MetodosDePagoController;
use App\Http\Controllers\Admin\OperacionesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RegistrarPagoController;
use App\Http\Controllers\Admin\RegistrarPagoLibreController;
use App\Http\Controllers\Admin\SolicitudesController;
use App\Http\Controllers\Admin\TasasController;

Route::get('', [HomeController::class, 'index'])->name('admin.index');

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
Route::middleware(['fondo_provi'])->group(function () {
    Route::resource('/solicitudes/fondo-provicional', FondoProvicionalController::class)->names('admin.fondosprovicionales');
});

//Prestamos
Route::resource('/prestamos', PrestamosController::class)->names('admin.prestamos');
Route::resource('/operaciones', OperacionesController::class)->names('admin.operaciones');
Route::resource('/gestiones', GestionesController::class)->names('admin.gestiones');
Route::resource('/compromisos', CompromisosController::class)->names('admin.compromisos');
Route::resource('/prestamos/registrar-pago', RegistrarPagoController::class)->names('admin.registrarpago');
Route::get('registrarpago/create2', 'App\Http\Controllers\Admin\RegistrarPagoController@create2')->name('admin.registrarpago.create2');
Route::resource('/prestamos/registrar-pago-libre', RegistrarPagoLibreController::class)->names('admin.registrarpagolibre');
Route::resource('/prestamos/gestion-cobranza', GestionCobranzaController::class)->names('admin.gestioncobranza');

//Usuarios
Route::resource('/usuarios', UsuariosController::class)->middleware('can:admin.usuarios.index')->names('admin.usuarios');

//Sucursales
Route::resource('/sucursales', SucursalesController::class)->names('admin.sucursales');

//Cuentas
Route::resource('/cuentas', CuentasController::class)->names('admin.cuentas');

//Metodos de Pago
Route::resource('/metodos-de-pago', MetodosDePagoController::class)->names('admin.metodosdepago');

//Tasas
Route::resource('/tasas', TasasController::class)->names('admin.tasas');

//Perfil
Route::resource('/perfil', ProfileController::class)->names('admin.perfil');