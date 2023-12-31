@extends('adminlte::page')

@section('title', 'Registrar Pago Libre')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Pago Libre</h1>
@stop

@section('content')
    <form action="#" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <h3 class="text-secondary"><strong>DETALLE DE CLIENTE</strong></h3>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <div class="text-center">
                                <img src="{{ asset('storage/'. $cliente->imagen) }}" class="rounded mx-auto d-block" id="img" alt="userPhoto" style="height: 150px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="form-group ml-1">
                                <a data-toggle="modal" data-target="#verFoto-modal" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass-plus mr-1"></i><strong>Visualizar foto</strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="sucursal">Sucursal</label>
                            <select class="form-control" id="sucursal" name="sucursal" disabled>
                                <option value=""{{ old('sucursal', $cliente->sucursal) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}"{{ old('sucursal', $cliente->sucursal_id) == $sucursal->id ? ' selected' : '' }}>{{ $sucursal->sucursal }}</option>
                                @endforeach                     
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="jcc">JCC</label>
                            <select class="form-control" id="jcc" name="jcc" disabled>
                                <option value=""{{ old('jcc', $cliente->jcc) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($jccs as $jcc)
                                    <option value="{{ $jcc->id }}"{{ old('sucursal', $cliente->jcc_id) == $jcc->id ? ' selected' : '' }}>{{ $jcc->nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="asesorCredito">Asesor de Credito</label>
                            <select class="form-control" id="asesorCredito" name="asesorCredito" disabled>
                                <option value=""{{ old('asesorCredito', $cliente->asesor) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($asesores as $asesor)
                                    <option value="{{ $asesor->id }}"{{ old('sucursal', $cliente->asesor_id) == $asesor->id ? ' selected' : '' }}>{{ $asesor->nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nDocumento">Numero de documento</label>
                            <input type="number" class="form-control" name="nDocumento" id="nDocumento" value="{{$cliente->documento}}" readonly>
                            <div class="valid-feedback">
                                DNI Valido!
                            </div>
                            <div class="invalid-feedback">
                                DNI Invalido!
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" value="{{$cliente->nombres}}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="aPaterno">Apellido Paterno</label>
                            <input type="text" class="form-control" name="aPaterno" id="aPaterno" value="{{$cliente->ape_pat}}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="aMaterno">Apellido Materno</label>
                            <input type="text" class="form-control" name="aMaterno" id="aMaterno" value="{{$cliente->ape_mat}}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" name="telefono" id="telefono" value="{{$cliente->telefono}}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="abono">Abono</label>
                            <input type="number" class="form-control" name="abono" id="abono">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="mora">Mora</label>
                            <input type="number" class="form-control" name="mora" id="mora">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="gas">Gas</label>
                            <input type="number" class="form-control" name="gas" id="gas">
                        </div>
                    </div>
                </div>  

                    
                <div class="col-12">
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('admin.prestamos.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Procesar</button>
                    </div>
                </div>

                <div id="verFoto-modal" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Previsualizar foto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="{{ asset('storage/'. $cliente->imagen) }}" class="rounded mx-auto d-block" id="view-img" alt="userPhoto" style="height: 400px;">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

@stop

@section('js')
    <script>

    </script>
@stop
