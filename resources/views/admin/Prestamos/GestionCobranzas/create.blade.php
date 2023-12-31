@extends('adminlte::page')

@section('title', 'Gestión de Cobranza')

@section('content_header')
    <h1 class="m-0 text-dark">Gestión de Cobranza</h1>
@stop

@section('content')
    <form action="{{ route('admin.gestioncobranza.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <input type="hidden" class="form-control" name="cliente_id" id="cliente_id" value="{{$solicitud->cliente_id}}">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <input type="text" class="form-control" name="cliente" id="cliente" value="{{$solicitud->nombre_cliente}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="fechaOperacion">Fecha de operacion</label>
                            <input type="date" class="form-control" name="fechaOperacion" id="fechaOperacion" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado">
                                <option selected>Selecciona</option>
                                <option value="Cliente no estuvo">Cliente no estuvo</option>
                                <option value="Nadie en casa">Nadie en casa</option>
                                <option value="Se coordinó con familiar">Se coordinó con familiar</option>
                                <option value="Atendio el mismo cliente">Atendio el mismo cliente</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="capital">Capital</label>
                            <input type="number" class="form-control" name="capital" id="capital" value="{{$solicitud->mon_sol}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="saldoPrestamo">Saldo Préstamo</label>
                            <input type="number" class="form-control" name="saldoPrestamo" id="saldoPrestamo" value="{{$saldo_prestamo}}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="compromisoPago" name="compromisoPago" value="1">
                                <label class="custom-control-label" for="compromisoPago">Compromiso de Pago?</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" id="compromiso-pago-section" hidden>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" id="fecha" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="hora">Hora</label>
                                    <input type="time" class="form-control" name="hora" id="hora" value="{{ date('H:i') }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="monto">Monto</label>
                                    <input type="number" class="form-control" name="monto" id="monto">
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>    
                <div class="col-12">
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('admin.prestamos.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('js')
    <script>

        document.getElementById('compromisoPago').addEventListener('change', function() {
            var x = document.getElementById('compromiso-pago-section');
            if (this.checked) {
                x.removeAttribute('hidden');
            } else {
                x.setAttribute('hidden', '');
            }
        });

        window.onload = function() {
            var hora = document.getElementById('hora');

            setInterval(function() {
                var now = new Date();
                var hours = now.getHours().toString().padStart(2, '0');
                var minutes = now.getMinutes().toString().padStart(2, '0');
                hora.value = hours + ':' + minutes;
            }, 1000);
        };

    </script>
@stop
