@extends('adminlte::page')

@section('title', 'Sucursales')

@section('content_header')
    <h1 class="m-0 text-dark">Sucursales</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @endif
    @livewire('sucursales.show-sucursales')

@stop