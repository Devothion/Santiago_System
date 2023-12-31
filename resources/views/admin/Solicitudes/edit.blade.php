@extends('adminlte::page')

@section('title', 'Editar Solicitud')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Solicitud</h1>
@stop

@section('content')

    <!-- ------------------------------------- -->
    <!-- FALTAN ARREGLAR LOS ID's Y LOS NAME's -->
    <!-- FALTAN ARREGLAR LA ETIQUETA FORM ------->
    <!-- ------------------------------------- -->
    <form action="{{ route('admin.solicitudes.update', ['solicitude' => $solicitud->id]) }}" method="POST">
        @csrf
        @method('PUT')
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
                                <option value="" {{ old('estado', $solicitud->estado) == '' ? 'selected' : '' }}>Selecciona</option>
                                <option {{ old('estado', $solicitud->estado) == 'En Analisis' ? 'selected' : '' }}>En Analisis</option>
                                <option {{ old('estado', $solicitud->estado) == 'En Espera' ? 'selected' : '' }}>En Espera</option>
                                <option {{ old('estado', $solicitud->estado) == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                                <option {{ old('estado', $solicitud->estado) == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                            </select>  
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="cliente" name="cliente" data-live-search="true">
                                    <option value="" {{ old('cliente', $solicitud->cliente_id) == '' ? 'selected' : '' }}>Selecciona</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" {{ old('cliente', $solicitud->cliente_id) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombres.' '.$cliente->ape_pat.' '.$cliente->ape_mat }}</option>
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
                                <option value="" {{ old('tSolicitud', $solicitud->tip_sol) == '' ? 'selected' : '' }}>Selecciona</option>
                                <option {{ old('tSolicitud', $solicitud->tip_sol) == 'Nueva' ? 'selected' : '' }}>Nueva</option>
                                <option {{ old('tSolicitud', $solicitud->tip_sol) == 'Renovacion' ? 'selected' : '' }}>Renovacion</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="cuentaAsignada">Cuenta Asignada</label>
                            <select class="form-control" id="cuentaAsignada" name="cuentaAsignada">
                                <option value="" {{ old('cuentaAsignada', $solicitud->cta_asig) == '' ? 'selected' : '' }}>Selecciona</option>
                                @foreach ($cuentas as $cuenta)
                                    <option value="{{$cuenta->id}}" {{ old('cuentaAsignada', $cuenta->id) ? 'selected' : '' }}>{{$cuenta->entidadBancaria->banco.' - '.$cuenta->codigo}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="fechaAtencion">Fecha de atencion</label>
                            <input type="date" class="form-control" name="fechaAtencion" id="fechaAtencion" value="{{ old('fechaAtencion', $solicitud->fech_ate) }}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="plazo">Plazo</label>
                            <select class="form-control" id="plazo" name="plazo">
                                <option value="" {{ old('plazo', $solicitud->plazo) == '' ? 'selected' : '' }}>Selecciona</option>
                                <option value="12" {{ old('plazo', $solicitud->plazo) == '12' ? 'selected' : '' }}>12 semanas</option>
                                <option value="15" {{ old('plazo', $solicitud->plazo) == '15' ? 'selected' : '' }}>15 semanas</option>
                                <option value="18" {{ old('plazo', $solicitud->plazo) == '18' ? 'selected' : '' }}>18 semanas</option>
                                <option value="20" {{ old('plazo', $solicitud->plazo) == '20' ? 'selected' : '' }}>20 semanas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="montoSolicitado">Monto Solicitado</label>
                            <input type="number" class="form-control" name="montoSolicitado" id="montoSolicitado" placeholder="0.00" value="{{$solicitud->mon_sol}}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tasaInteres">Tasa de interes</label>
                            <input type="number" class="form-control" name="tasaInteres" id="tasaInteres" placeholder="0.00" value="{{$solicitud->tas_int}}" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="capitalInteres">Capital + Interes</label>
                            <input type="number" class="form-control" name="capitalInteres" id="capitalInteres" placeholder="0.00" value="{{$solicitud->cap_int}}" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tasaMora">Tasa de Mora</label>
                            <input type="number" class="form-control" name="tasaMora" id="tasaMora" value="5.00" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="frecuenciaPago">Frecuencia de Pago</label>
                            <select class="form-control" id="frecuenciaPago" name="frecuenciaPago">
                                <option value="" {{ old('frecuenciaPago', $solicitud->frecuenciaPago) == '' ? 'selected' : '' }}>Selecciona</option>
                                <option {{ old('frecuenciaPago', $solicitud->fre_pag) == 'Semanal' ? 'selected' : '' }}>Semanal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="fechaPrimerPago">Fecha de Primer pago</label>
                            <input type="date" class="form-control" name="fechaPrimerPago" id="fechaPrimerPago" value="{{ old('fechaAtencion', $solicitud->fpri_pag) }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="asesorCredito">Asesor de credito</label>
                            <select class="form-control" id="asesorCredito" name="asesorCredito">
                                <option value="1" {{ old('asesorCredito', $solicitud->asesorCredito) == 1 ? 'selected' : '' }}>Selecciona</option>
                                @foreach ($asesores as $asesor)
                                    <option value="{{$asesor->id}}" {{ old('asesorCredito', $solicitud->analista_id) == $asesor->id ? 'selected' : '' }}>{{$asesor->codigo.' '.$asesor->nombres}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3">{{$solicitud->observ}}</textarea>
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
        $(document).ready(function(){

            $(".alert").delay(4500).slideUp(200, function() {
                $(this).alert('close');
            });

            var tasaInteres;
            var tasaCliente;

            function setTasas(plazo) {
                switch(plazo) {
                    case '12':
                        tasaInteres = 104;
                        tasaCliente = 44/100;
                        break;
                    case '15':
                        tasaInteres = 130;
                        tasaCliente = 50/100;
                        break;
                    case '18':
                        tasaInteres = 156;
                        tasaCliente = 50/100;
                        break;
                    case '20':
                        tasaInteres = 173;
                        tasaCliente = 50/100;
                        break;
                    default:
                        tasaInteres = '';
                        tasaCliente = '';
                }
                $('#tasaInteres').val(tasaInteres);
            }

            // Establecer tasas en la carga de la página
            setTasas($('#plazo').val());

            // Actualizar tasas cuando cambia #plazo
            $('#plazo').change(function(){
                setTasas($(this).val());
            });

            // Actualizar #capitalInteres cuando cambia #montoSolicitado
            $('#montoSolicitado').on('input', function() {
                $('#capitalInteres').val(this.value * (1 + tasaCliente));
            });
        });
    </script>
@stop
