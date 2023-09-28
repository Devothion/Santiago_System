@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Usuario</h1>
@stop

@section('content')

    <!-- ------------------------------------- -->
    <!-- FALTAN ARREGLAR LOS ID's Y LOS NAME's -->
    <!-- FALTAN ARREGLAR LA ETIQUETA FORM ------->
    <!-- ------------------------------------- -->
    <form action="{{ route('admin.usuarios.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nDocumento">Numero de documento</label>
                            <input type="number" class="form-control" name="nDocumento" id="nDocumento">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="aPaterno">Apellido Paterno</label>
                            <input type="text" class="form-control" name="aPaterno" id="aPaterno">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="aMaterno">Apellido Materno</label>
                            <input type="text" class="form-control" name="aMaterno" id="aMaterno">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" name="telefono" id="telefono">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="codigo">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" id="contrasena">
                        </div>
                    </div>
                    <div class="col-12 mt-2" id="asignarRoles-section">
                        <h3 class="text-secondary"><strong>ASIGNAR ROLES</strong></h3>
                        <div class="row">
                            @foreach ($roles as $role)
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="{{ $role->name }}" class="d-flex justify-content-center">{{ $role->name }}</label>
                                        <div class="text-center m-3">
                                            <img src="{{ asset('img/'.$role->name.'.svg') }}" class="rounded" alt="{{ $role->name }}-img" style="height: 100px;">
                                        </div>
                                        <input type="checkbox" class="form-control" name="role[]" id="{{ $role->name }}" value="{{ $role->id }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="d-flex justify-content-between my-4">
                            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                            <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
