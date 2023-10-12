@extends('adminlte::page')

@section('title', 'Editar Cuenta')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Cuenta</h1>
@stop

@section('content')

    <!-- ------------------------------------- -->
    <!-- FALTAN ARREGLAR LOS ID's Y LOS NAME's -->
    <!-- FALTAN ARREGLAR LA ETIQUETA FORM ------->
    <!-- ------------------------------------- -->

    <form action="{{ route('admin.cuentas.update', ['cuenta' => $cuenta->id]) }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="entidadFinanciera">Entidad bancaria</label>
                            <select class="form-control" id="entidadFinanciera" name="entidadFinanciera">
                                {{-- <option value="">Seleciona</option>
                                @foreach ($entBancarias as $entBancaria)
                                    <option value="{{$entBancaria->id}}">{{$entBancaria->banco}}</option>
                                @endforeach --}}

                                <option value=""{{ old('sucursal', $cuenta->entidad_bancaria_id) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($entBancarias as $entBancaria)
                                    <option value="{{ $entBancaria->id }}"{{ old('sucursal', $cuenta->entidad_bancaria_id) == $entBancaria->id ? ' selected' : '' }}>{{ $entBancaria->banco }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nCuenta">Numero de cuenta</label>
                            <input type="number" class="form-control" name="nCuenta" id="nCuenta" value="{{$cuenta->numero_cuenta}}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="number" class="form-control" name="codigo" id="codigo" value="{{$cuenta->codigo}}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('admin.cuentas.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                            <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
