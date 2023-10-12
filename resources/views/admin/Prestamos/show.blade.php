@extends('adminlte::page')

@section('title', 'Estado de Cuenta')

@section('content_header')
    <h1 class="m-0 text-dark">Estado de Cuenta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <dl class="row">
                <div class="col-6">
                    <div class="row">
                        <dt class="col-sm-4 display-6">Apellidos y Nombres:</dt>
                        <dd class="col-sm-8 display-6">Edwin Chavez Gamboa</dd>
                        <dt class="col-sm-4">Direccion:</dt>
                        <dd class="col-sm-8">Dirección 321</dd>
                        <dt class="col-sm-4">ID Prestamo:</dt>
                        <dd class="col-sm-8">1</dd>
                        <dt class="col-sm-4">Estado:</dt>
                        <dd class="col-sm-8">Aprobada</dd>
                        <dt class="col-sm-4">Numero de cuotas:</dt>
                        <dd class="col-sm-8">12</dd>
                        <dt class="col-sm-4">Sucursal:</dt>
                        <dd class="col-sm-8">GR018</dd>
                        <dt class="col-sm-4">JCC:</dt>
                        <dd class="col-sm-8">D015</dd>
                        <dt class="col-sm-4">Asesor de credito:</dt>
                        <dd class="col-sm-8">AS017</dd>
                        <dt class="col-sm-4">Tipo de solicitud:</dt>
                        <dd class="col-sm-8">Nuevo</dd>
                        <dt class="col-sm-4">Fecha desenbolso:</dt>
                        <dd class="col-sm-8">12/09/2023</dd>
                        <dt class="col-sm-4">Fecha término:</dt>
                        <dd class="col-sm-8">28/11/2023</dd>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <dt class="col-sm-4">ID Solicitud:</dt>
                        <dd class="col-sm-8">1</dd>
                        <dt class="col-sm-4">Capital:</dt>
                        <dd class="col-sm-8">1200.00</dd>
                        <dt class="col-sm-4">Total:</dt>
                        <dd class="col-sm-8">1728.00</dd>
                        <dt class="col-sm-4">Monto Interes:</dt>
                        <dd class="col-sm-8">104.00</dd>
                        <dt class="col-sm-4">Deducciones:</dt>
                        <dd class="col-sm-8">--</dd>
                        <dt class="col-sm-4">Fecha Inicio:</dt>
                        <dd class="col-sm-8">12/09/2023</dd>
                        <dt class="col-sm-4">Analista de credito:</dt>
                        <dd class="col-sm-8">LC023</dd>
                        <dt class="col-sm-4">Cuota:</dt>
                        <dd class="col-sm-8">144.00</dd>
                    </div>
                </div>
            </dl>
        </div>
    </div>
    <div class="card">
        @livewire('prestamos.estado-cuenta.tabla-dinamica')
    </div>

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop