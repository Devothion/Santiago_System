@extends('adminlte::page')

@section('title', 'Registrar Pagos')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Pagos</h1>
@stop

@section('content')
    <form action="{{ route('admin.registrarpago.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <h3 class="text-secondary"><strong>DETALLE DE CRÉDITO</strong></h3>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {{-- <label for="solicitudId">Solicitud ID</label> --}}
                            <input type="hidden" class="form-control" name="solicitudId" id="solicitudId" value="{{$solicitud->id}}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {{-- <label for="cuotaId">Cuota ID</label> --}}
                            <input type="hidden" class="form-control" name="cuotaId" id="cuotaId" value="{{$cuota_id ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <input type="text" class="form-control" name="cliente" id="cliente" value="{{$solicitud->nombre_cliente}}" readonly>
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
                            <label for="capital">Capital</label>
                            <input type="number" class="form-control" name="capital" id="capital" value="{{$solicitud->mon_sol}}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="saldoPrestamo">Saldo Préstamo</label>
                            <input type="number" class="form-control" name="saldoPrestamo" id="saldoPrestamo" value="{{$saldo_prestamo ?? ''}}" readonly>
                        </div>
                    </div>
                </div>
                <h3 class="text-secondary"><strong>DETALLE DE PAGO</strong></h3>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="saldoDeuda">Saldo deuda hasta</label>
                            <input type="number" class="form-control" name="saldoDeuda" id="saldoDeuda" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="saldoMora">Saldo Mora</label>
                            <input type="number" class="form-control" name="saldoMora" id="saldoMora" value="0.00" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cuotaNormal">Cuota Normal</label>
                            <input type="number" class="form-control" name="cuotaNormal" id="cuotaNormal" value="{{$cuota_normal ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="totalPagar">Total a Pagar</label>
                            <input type="number" class="form-control" name="totalPagar" id="totalPagar" readonly>
                        </div>
                    </div>
                </div>
                <h3 class="text-secondary"><strong>MÉTODOS DE PAGO</strong></h3>
                <div class="row">
                    <div class="btn-group btn-group-toggle col-12 my-3" data-toggle="buttons">
                        <label class="btn btn-transparent border border-secondary m-2">
                          <input type="radio" name="metodoPago" id="efectivo" value="1" autocomplete="off" required>EFECTIVO
                        </label>
                        <label class="btn btn-transparent border border-secondary m-2">
                          <input type="radio" name="metodoPago" id="deposito_cuenta" value="2" autocomplete="off">DEPÓSITOS EN CUENTA
                        </label>
                        <label class="btn btn-transparent border border-secondary m-2">
                          <input type="radio" name="metodoPago" id="transferencia_bancaria" value="3" autocomplete="off">TRANSFERENCIA BANCARIA
                        </label>
                        <label class="btn btn-transparent border border-secondary m-2">
                          <input type="radio" name="metodoPago" id="pago_yape" value="4" autocomplete="off">PAGO CON YAPE
                        </label>
                        <label class="btn btn-transparent border border-secondary m-2">
                          <input type="radio" name="metodoPago" id="pago_plin" value="5" autocomplete="off">PAGO CON PLIN
                        </label>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="abono">Abono</label>
                            <input type="number" class="form-control" name="abono" id="abono" value="{{$cuota_normal ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="mora">Moras</label>
                            <input type="number" class="form-control" name="mora" id="mora">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="gas">Gas</label>
                            <input type="number" class="form-control" name="gas" id="gas">
                        </div>
                    </div>
                </div>    

                    
                <div class="col-12">
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('admin.prestamos.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Procesar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@stop

@section('js')
    <script>

    // Obtén todos los botones
    var buttons = document.querySelectorAll('.btn-group-toggle .btn');

    // Añade un controlador de eventos a cada botón
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Elimina la clase 'btn-transparent' y añade la clase 'btn-secondary' al botón clicado
            this.classList.remove('btn-transparent');
            this.classList.add('btn-secondary');

            // Para los demás botones, elimina la clase 'btn-secondary' y añade la clase 'btn-transparent'
            buttons.forEach(function(otherButton) {
                if (otherButton !== this) {
                    otherButton.classList.remove('btn-secondary');
                    otherButton.classList.add('btn-transparent');
                }
            }, this);
        });
    });

    </script>
@stop
