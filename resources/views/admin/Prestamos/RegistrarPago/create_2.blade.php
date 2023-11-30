@extends('adminlte::page')

@section('title', 'Registrar Pagos')

@section('content_header')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <h1 class="m-0 text-dark">Registrar Pagos</h1>
@stop

@section('content')
    @livewireScripts
    <form action="{{ route('admin.registrarpago.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <h3 class="text-secondary"><strong>DETALLE DE CRÉDITO</strong></h3>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="solicitudId" id="solicitudId" value="{{$solicitud->id}}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="cuotaId" id="cuotaId" value="{{$cuota_id ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <input type="text" class="form-control" name="cliente" id="cliente" value="{{$solicitud->nombre_cliente}}" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="saldoPrestamo">Saldo Préstamo</label>
                            <input type="number" class="form-control" name="saldoPrestamo" id="saldoPrestamo" value="{{$saldo_prestamo ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="capital">Capital</label>
                            <input type="number" class="form-control" name="capital" id="capital" value="{{$solicitud->mon_sol}}" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="fechaOperacion">Fecha de operacion</label>
                            <input type="date" class="form-control" name="fechaOperacion" id="fechaOperacion" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                <h3 class="text-secondary"><strong>DETALLE DE PAGO</strong></h3>
                
                @livewire('prestamos.registrar-pago.show-tabla-cuotas', ['cuota' => $cuota, 'solicitud_id' => $solicitud->id])
                
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="saldoDeuda">Saldo deuda hasta ( {{ \Carbon\Carbon::now()->format('d-m-Y') }} )</label>
                            <input type="number" class="form-control" name="saldoDeuda" id="saldoDeuda" value="{{$saldo_deuda_hasta}}" readonly>
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
                            <label class="font-weight-bold" for="totalPagar">Total a Pagar</label>
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
                    @livewire('prestamos.registrar-pago.show-sub-total')
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
                    <div class="col-12" id="detalle-transferencia-section" hidden>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cuenta">Cuenta Asignada</label>
                                    <select class="form-control" id="cuenta" name="cuenta">
                                        <option value="" selected>Selecciona</option>
                                        @foreach ($cuentas as $cuenta)
                                            <option value="{{$cuenta->id}}">{{$cuenta->entidadBancaria->banco." - ".$cuenta->numero_cuenta}}</option>
                                        @endforeach
                                    </select>    
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nrOperacion">Numero de Operacion</label>
                                    <input type="number" class="form-control" name="nrOperacion" id="nrOperacion">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" id="detalle-yape-section" hidden>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cuenta">Numero Asignado</label>
                                    <select class="form-control" id="cuenta" name="cuenta">
                                        <option value="" selected>Selecciona</option>
                                        @foreach ($cuentas_yape as $cuenta_yape)
                                            <option value="{{$cuenta_yape->id}}">{{$cuenta_yape->entidadBancaria->banco." - ".$cuenta_yape->numero_cuenta}}</option>
                                        @endforeach
                                    </select>    
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nrOperacion">Numero de Operacion</label>
                                    <input type="number" class="form-control" name="nrOperacion" id="nrOperacion">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" id="detalle-plin-section" hidden>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cuenta">Numero Asignado</label>
                                    <select class="form-control" id="cuenta" name="cuenta">
                                        <option value="" selected>Selecciona</option>
                                        @foreach ($cuentas_plin as $cuenta_plin)
                                            <option value="{{$cuenta_plin->id}}">{{$cuenta_plin->entidadBancaria->banco." - ".$cuenta_plin->numero_cuenta}}</option>
                                        @endforeach
                                    </select>    
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nrOperacion">Numero de Operacion</label>
                                    <input type="number" class="form-control" name="nrOperacion" id="nrOperacion">
                                </div>
                            </div>
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

    document.addEventListener('DOMContentLoaded', function () {
        const radioButtons = document.querySelectorAll('input[name="metodoPago"]');
        const transferenciaSection = document.getElementById('detalle-transferencia-section');
        const yapeSection = document.getElementById('detalle-yape-section');
        const plinSection = document.getElementById('detalle-plin-section');

        radioButtons.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === '2' || this.value === '3') {
                    transferenciaSection.removeAttribute('hidden');
                } else {
                    transferenciaSection.setAttribute('hidden', '');
                    clearSection(transferenciaSection);
                }

                if (this.value === '4') {
                    yapeSection.removeAttribute('hidden');
                    
                } else {
                    yapeSection.setAttribute('hidden', '');
                    clearSection(yapeSection);
                }

                if (this.value === '5') {
                    plinSection.removeAttribute('hidden');
                    
                } else {
                    plinSection.setAttribute('hidden', '');
                    clearSection(plinSection);
                }

            });
        });
    });

    function clearSection(section) {
        const inputs = section.querySelectorAll('input');
        const selects = section.querySelectorAll('select');

        inputs.forEach(input => {
            input.value = '';
        });

        selects.forEach(select => {
            select.selectedIndex = 0;
        });
    }

    window.addEventListener('actualizarSubtotal', event => {
        console.log(event);
    });

    </script>
@stop
