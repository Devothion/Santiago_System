@extends('adminlte::page')

@section('title', 'Editar Sucursal')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Sucursal</h1>
@stop

@section('content')

    <!-- ------------------------------------- -->
    <!-- FALTAN ARREGLAR LOS ID's Y LOS NAME's -->
    <!-- FALTAN ARREGLAR LA ETIQUETA FORM ------->
    <!-- ------------------------------------- -->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="nombreSucursal">Nombre de Sucursal</label>
                        <input type="text" class="form-control" name="nombreSucursal" id="nombreSucursal" value="{{ $sucursal->sucursal }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="departamento">Departamento</label>
                        <select class="form-control" id="departamento" name="departamento">
                            <option value=""{{ old('departamento_id', $sucursal->departamento_id) == '' ? ' selected' : '' }}>Selecciona</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}"{{ old('departamento_id', $sucursal->departamento_id) == $departamento->id ? ' selected' : '' }}>{{ $departamento->departamento }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <select class="form-control" id="provincia" name="provincia">
                            <option value=""{{ old('provincia_id', $sucursal->provincia_id) == '' ? ' selected' : '' }}>Selecciona</option>
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia->id }}"{{ old('provincia_id', $sucursal->provincia_id) == $provincia->id ? ' selected' : '' }}>{{ $provincia->provincia }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="distrito">Distrito</label>
                        <select class="form-control" id="distrito" name="distrito">
                            <option value=""{{ old('distrito_id', $sucursal->distrito_id) == '' ? ' selected' : '' }}>Selecciona</option>
                            @foreach ($distritos as $distrito)
                                <option value="{{ $distrito->id }}"{{ old('distrito_id', $sucursal->distrito_id) == $distrito->id ? ' selected' : '' }}>{{ $distrito->distrito }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('admin.sucursales.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
