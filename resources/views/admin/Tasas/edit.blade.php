@extends('adminlte::page')

@section('title', 'Editar Tasa')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Tasa</h1>
@stop

@section('content')

    <!-- ------------------------------------- -->
    <!-- FALTAN ARREGLAR LOS ID's Y LOS NAME's -->
    <!-- FALTAN ARREGLAR LA ETIQUETA FORM ------->
    <!-- ------------------------------------- -->
    <form action="{{ route('admin.tasas.update', ['tasa' => $tasa->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tipoTasa">Tipo de Tasa</label>
                            <input type="text" class="form-control" name="tipoTasa" id="tipoTasa" value="{{$tasa->tipo_tasa}}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="valorTasa">Valor de Tasa</label>
                            <input type="numbre" step="any" class="form-control" name="valorTasa" id="valorTasa" value="{{$tasa->valor}}">
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('admin.tasas.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                            <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('js')

@stop
