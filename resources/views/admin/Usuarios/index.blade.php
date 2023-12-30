@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1 class="m-0 text-dark">Usuarios</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @endif
    @livewire('usuarios.show-usuarios')
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script>

    </script>
@stop