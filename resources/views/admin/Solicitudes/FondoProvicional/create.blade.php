@extends('adminlte::page')

@section('title', 'Fondo Provicional')

@section('content_header')
    <h1 class="m-0 text-dark">Nuevo Fondo Provicional</h1>
@stop

@section('content')
    <form action="#" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <input type="text" class="form-control" name="cliente" id="cliente" value="{{$solicitud->nombre_cliente}}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cuentaAsignada">Cuenta Asignada</label>
                            <select class="form-control" id="cuentaAsignada" name="cuentaAsignada">
                                <option value="" selected>Selecciona</option>
                                <option>BCP-5</option>
                                <option>BBVA-5</option>
                                <option>Scotiabank-1</option>
                                <option>BCP-1</option>
                                <option>BCP-2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="montoSolicitado">Monto Solicitado</label>
                            <input type="number" class="form-control" name="montoSolicitado" id="montoSolicitado" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="fechaAtencion">Fecha de atencion</label>
                            <input type="date" class="form-control" name="fechaAtencion" id="fechaAtencion" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('admin.solicitudes.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
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
