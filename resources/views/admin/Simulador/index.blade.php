@extends('adminlte::page')

@section('title', 'Simulador')

@section('content_header')
    <h1 class="m-0 text-dark">Simulador</h1>
@stop

@section('content')

    <!-- ------------------------------------- -->
    <!-- FALTAN ARREGLAR LOS ID's Y LOS NAME's -->
    <!-- FALTAN ARREGLAR LA ETIQUETA FORM ------->
    <!-- ------------------------------------- -->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mt-2" id="detalleCliente-section">
                    <h3 class="text-secondary"><strong>DETALLE DE CLIENTE</strong></h3>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nDocumento">Numero de documento</label>
                                <input type="number" class="form-control" name="nDocumento" id="nDocumento">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" name="nombres" id="nombres">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="aPaterno">Apellido Paterno</label>
                                <input type="text" class="form-control" name="aPaterno" id="aPaterno">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="aMaterno">Apellido Materno</label>
                                <input type="text" class="form-control" name="aMaterno" id="aMaterno">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="direcDomicilio">Direccion de domicilio</label>
                                <input type="text" class="form-control" name="direcDomicilio" id="direcDomicilio">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2" id="detalleCliente-section">
                    <h3 class="text-secondary"><strong>DETALLE DE SOLICITUD</strong></h3>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="tipoSolicitud">Tipo de Solicitud</label>
                                <select class="form-control" id="tipoSolicitud" name="tipoSolicitud">
                                    <option selected>Nuevo</option>
                                    <option value="1">Renovacion</option>
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
                                    <option selected>12 Semanas</option>
                                    <option value="">15 Semanas</option>
                                    <option value="">18 Semanas</option>
                                    <option value="">20 Semanas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="montoSolicitado">Monto Solicitado</label>
                                <input type="number" class="form-control" name="montoSolicitado" id="montoSolicitado">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="cuentaDeposito">Cuenta Deposito</label>
                                <select class="form-control" id="cuentaDeposito" name="cuentaDeposito">
                                    <option selected>Selecciona</option>
                                    <option value="1">Cuenta Propia</option>
                                    <option value="2">Cuenta de Terceros</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="cuentaAsignada">Cuenta Asignada</label>
                                <select class="form-control" id="cuentaAsignada" name="cuentaAsignada">
                                    <option value="" selected>Selecciona</option>
                                    @foreach ($entBancarias as $entBancaria)
                                        <option value="{{$entBancaria->id}}">{{$entBancaria->banco}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="fechaPrimerPago">Fecha de primer pago</label>
                                <input type="date" class="form-control" name="fechaPrimerPago" id="fechaPrimerPago">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2" id="detalleCliente-section">
                    <h3 class="text-secondary"><strong>ANALISTA/JCC/ASESOR</strong></h3>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="analistaCredito">Analista de Credito</label>
                                <select class="form-control" id="analistaCredito" name="analistaCredito">
                                    <option value="" selected>Selecciona</option>
                                    @foreach ($analistas as $analista)
                                        <option value="{{$analista->id}}">{{$analista->codigo.' '.$analista->nombres}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="jcc">JCC</label>
                                <select class="form-control" id="jcc" name="jcc">
                                    <option value="" selected>Selecciona</option>
                                    @foreach ($jccs as $jcc)
                                        <option value="{{$jcc->id}}">{{$jcc->codigo.' '.$jcc->nombres}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="asesorCredito">Asesor de credito</label>
                                <select class="form-control" id="asesorCredito" name="asesorCredito">
                                    <option value="" selected>Selecciona</option>
                                    @foreach ($asesores as $asesor)
                                        <option value="{{$asesor->id}}">{{$asesor->codigo.' '.$asesor->nombres}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2" id="detalleCliente-section">
                    <h3 class="text-secondary"><strong>CUENTA PROPIA</strong></h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cp_entidadFinanciera">Entidad financiera</label>
                                <select class="form-control" id="cp_entidadFinanciera" name="cp_entidadFinanciera">
                                    <option value="" selected>Selecciona</option>
                                    @foreach ($entBancarias as $entBancaria)
                                        <option value="{{$entBancaria->id}}">{{$entBancaria->banco}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cp_numeroCuenta">Numero de cuenta</label>
                                <input type="number" class="form-control" name="cp_numeroCuenta" id="cp_numeroCuenta">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2" id="detalleCliente-section">
                    <h3 class="text-secondary"><strong>CUENTA DE TERCEROS</strong></h3>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ct_titular">Titular</label>
                                <input type="text" class="form-control" name="ct_titular" id="ct_titular">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ct_entidadFinanciera">Entidad financiera</label>
                                <select class="form-control" id="ct_entidadFinanciera" name="ct_entidadFinanciera">
                                    <option value="" selected>Selecciona</option>
                                    @foreach ($entBancarias as $entBancaria)
                                        <option value="{{$entBancaria->id}}">{{$entBancaria->banco}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ct_numeroCuenta">Numero de cuenta</label>
                                <input type="number" class="form-control" name="ct_numeroCuenta" id="ct_numeroCuenta">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2" id="detalleCliente-section">
                    <h3 class="text-secondary"><strong>AVAL</strong></h3>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="av_numeroCuenta">Numero de cuenta</label>
                                <input type="number" class="form-control" name="av_numeroCuenta" id="av_numeroCuenta">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="av_nombres">Nombres</label>
                                <input type="text" class="form-control" name="av_nombres" id="av_nombres">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="av_aPaterno">Apellido Paterno</label>
                                <input type="text" class="form-control" name="av_aPaterno" id="av_aPaterno">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="av_aMaterno">Apellido Materno</label>
                                <input type="text" class="form-control" name="av_aMaterno" id="av_aMaterno">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="av_direccionDomicilio">Direccion de domicilio</label>
                                <input type="text" class="form-control" name="av_direccionDomicilio" id="av_direccionDomicilio">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="av_telefono">Telefono</label>
                                <input type="number" class="form-control" name="av_telefono" id="av_telefono">
                            </div>
                        </div>
                    </div>  
                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('admin.prestamos.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
