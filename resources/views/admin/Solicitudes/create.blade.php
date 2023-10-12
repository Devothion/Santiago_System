@extends('adminlte::page')

@section('title', 'Nueva Solicitud')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Solicitud</h1>
@stop

@section('content')

    <!-- ------------------------------------- -->
    <!-- FALTAN ARREGLAR LOS ID's Y LOS NAME's -->
    <!-- FALTAN ARREGLAR LA ETIQUETA FORM ------->
    <!-- ------------------------------------- -->
    <form action="{{ route('admin.solicitudes.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="alert alert-info alert-dismissible fade show absolute-right" role="alert">
                    <strong>Recuerda:</strong> Si el cliente no existe, lo puedes crear dando click en "Agregar".
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado">
                                <option value="" selected>Selecciona</option>
                                <option>En Analisis</option>
                                <option>En Espera</option>
                                <option>Finalizado</option>
                                <option>Aprobado</option>
                            </select>  
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="cliente" name="cliente" data-live-search="true">
                                    <option selected>Selecciona</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nombres.' '.$cliente->ape_pat.' '.$cliente->ape_mat}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <a href="{{ route('admin.clientes.create') }}" class="btn btn-outline-info">Agregar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tSolicitud">Tipo Solicitud</label>
                            <select class="form-control" id="tSolicitud" name="tSolicitud">
                                <option value="" selected>Selecciona</option>
                                <option>Nueva</option>
                                <option>Antigua</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
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
                    <div class="col-3">
                        <div class="form-group">
                            <label for="fechaAtencion">Fecha de atencion</label>
                            <input type="date" class="form-control" name="fechaAtencion" id="fechaAtencion">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="plazo">Plazo</label>
                            <select class="form-control" id="plazo" name="plazo">
                                <option value="" selected>Selecciona</option>
                                <option>12 semanas</option>
                                <option>15 semanas</option>
                                <option>18 semanas</option>
                                <option>20 semanas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="montoSolicitado">Monto Solicitado</label>
                            <input type="number" class="form-control" name="montoSolicitado" id="montoSolicitado" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tasaInteres">Tasa de interes</label>
                            <input type="number" class="form-control" name="tasaInteres" id="tasaInteres" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="capitalInteres">Capital + Interes</label>
                            <input type="number" class="form-control" name="capitaInteres" id="capitaInteres" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tasaMora">Tasa de Mora</label>
                            <input type="number" class="form-control" name="tasaMora" id="tasaMora" value="5.00">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="frecuenciaPago">Frecuencia de Pago</label>
                            <select class="form-control" id="frecuenciaPago" name="frecuenciaPago">
                                <option value="" selected>Selecciona</option>
                                <option>Semanal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="fechaPrimerPago">Fecha de Primer pago</label>
                            <input type="date" class="form-control" name="fechaPrimerPago" id="fechaPrimerPago">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="asesorCredito">Asesor de credito</label>
                            <select class="form-control" id="asesorCredito" name="asesorCredito">
                                <option value="1" selected>Selecciona</option>
                                @foreach ($asesores as $asesor)
                                    <option value="{{$asesor->id}}">{{$asesor->codigo.' '.$asesor->nombres}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
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
    <script>
        $(".alert").delay(4500).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
@stop
