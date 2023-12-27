@extends('adminlte::page')

@section('title', 'Nuevo Metodo')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Metodo de Pago</h1>
@stop

@section('content')

    <!-- ------------------------------------- -->
    <!-- FALTAN ARREGLAR LOS ID's Y LOS NAME's -->
    <!-- FALTAN ARREGLAR LA ETIQUETA FORM ------->
    <!-- ------------------------------------- -->
    <form action="{{ route('admin.metodosdepago.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="metodoPago">Metodo de Pago</label>
                            <input type="text" class="form-control" name="metodoPago" id="metodoPago">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('admin.metodosdepago.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                            <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
