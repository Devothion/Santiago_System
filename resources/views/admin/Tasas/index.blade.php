@extends('adminlte::page')

@section('title', 'Tasa')

@section('content_header')
    <h1 class="m-0 text-dark">Tasas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @endif
    @livewire('tasas.show-tasas')
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
