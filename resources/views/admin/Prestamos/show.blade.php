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
                        <dd class="col-sm-8 display-6">{{$prestamos->nombre_cliente}}</dd>
                        <dt class="col-sm-4">Direccion:</dt>
                        <dd class="col-sm-8">{{$prestamos->cliente->direccion}}</dd>
                        <dt class="col-sm-4">ID Prestamo:</dt>
                        <dd class="col-sm-8">{{$prestamos->id}}</dd>
                        <dt class="col-sm-4">Estado:</dt>
                        <dd class="col-sm-8">{{$prestamos->estado}}</dd>
                        <dt class="col-sm-4">Numero de cuotas:</dt>
                        <dd class="col-sm-8">{{$prestamos->plazo}}</dd>
                        <dt class="col-sm-4">Sucursal:</dt>
                        <dd class="col-sm-8">{{$prestamos->cliente->sucursal->sucursal}}</dd>
                        <dt class="col-sm-4">JCC:</dt>
                        <dd class="col-sm-8">{{$prestamos->cliente->jcc->nombres." - ".$prestamos->cliente->jcc->codigo}}</dd>
                        <dt class="col-sm-4">Asesor de credito:</dt>
                        <dd class="col-sm-8">{{$prestamos->cliente->asesor->nombres." - ".$prestamos->cliente->asesor->codigo}}</dd>
                        <dt class="col-sm-4">Tipo de solicitud:</dt>
                        <dd class="col-sm-8">{{$prestamos->tip_sol}}</dd>
                        <dt class="col-sm-4">Numero de Contrato:</dt>
                        <dd class="col-sm-8">{{$prestamos->nro_contrato}}</dd>  
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <dt class="col-sm-4">ID Solicitud:</dt>
                        <dd class="col-sm-8">{{$prestamos->id}}</dd>
                        <dt class="col-sm-4">Capital:</dt>
                        <dd class="col-sm-8">{{"S/. ".$prestamos->mon_sol}}</dd>
                        <dt class="col-sm-4">Total:</dt>
                        <dd class="col-sm-8">{{"S/. ".$prestamos->cap_int}}</dd>
                        <dt class="col-sm-4">Monto Interes:</dt>
                        <dd class="col-sm-8">{{$prestamos->tas_int." %"}}</dd>
                        <dt class="col-sm-4">Deducciones:</dt>
                        <dd class="col-sm-8">--</dd>
                        <dt class="col-sm-4">Fecha término:</dt>
                        <dd class="col-sm-8">*</dd>
                        <dt class="col-sm-4">Fecha Inicio:</dt>
                        <dd class="col-sm-8">{{\DateTime::createFromFormat('Y-m-d', $prestamos->fpri_pag)->format('d-m-Y')}}</dd>
                        <dt class="col-sm-4">Analista de credito:</dt>
                        <dd class="col-sm-8">{{$prestamos->analista->nombres." - ".$prestamos->analista->codigo}}</dd>
                        <dt class="col-sm-4">Cuota:</dt>
                        <dd class="col-sm-8">{{"S/. ".$valor->cuota}}</dd>
                    </div>
                </div>
            </dl>
        </div>
    </div>
    <div class="card">
        @livewire('prestamos.estado-cuenta.tabla-dinamica', ['cuotas' => $cuotas, 'id' => $id])
    </div>

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop