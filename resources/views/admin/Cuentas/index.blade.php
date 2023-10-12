@extends('adminlte::page')

@section('title', 'Cuentas')

@section('content_header')
    <h1 class="m-0 text-dark">Cuentas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @endif
    @livewire('cuentas.show-cuentas')

@stop
