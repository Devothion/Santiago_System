@extends('adminlte::page')

@section('title', 'Metodo de Pago')

@section('content_header')
    <h1 class="m-0 text-dark">Metodos de Pago</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @endif
    @livewire('metodos-de-pago.show-metodos-de-pago')
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop