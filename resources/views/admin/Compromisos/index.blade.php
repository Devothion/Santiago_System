@extends('adminlte::page')

@section('title', 'Compromisos')

@section('content_header')
    <h1 class="m-0 text-dark">Compromisos</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @endif
    @livewire('compromisos.show-compromisos')
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop