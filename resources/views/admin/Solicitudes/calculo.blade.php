@extends('adminlte::page')

@section('title', 'Calculo de Solicitud')

@section('content_header')
    <h1 class="m-0 text-dark">Calculo de Solicitud</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-secondary text-center"><strong>ANEXO N° 1: RESUMEN DE CONTRATO Y CRONOGRAMA DE PAGOS</strong></h3><br>
            {{-- @php
                print_r($calculo);
            @endphp --}}
        </div>
        <div class="card-body">
            <dl class="row">
                <div class="col-4">
                    <div class="row">
                        <dt class="col-sm-6">Nombres de cliente:</dt>
                        <dd class="col-sm-6">{{$nombre}}</dd>
                        <dt class="col-sm-6">Nro de contrato:</dt>
                        <dd class="col-sm-6">{{$year}}-{{$id}}</dd>
                        <dt class="col-sm-6">Saldo Capital:</dt>
                        <dd class="col-sm-6">{{"S/. ".$calculo['prestamo']}}</dd>
                        <dt class="col-sm-6">Tipo de prestamo:</dt>
                        <dd class="col-sm-6">{{$tipo}}</dd>
                        <dt class="col-sm-6">Periodo:</dt>
                        <dd class="col-sm-6">{{$calculo['semanas']." semanas"}}</dd>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <dt class="col-sm-4">Tasa semanal:</dt>
                        <dd class="col-sm-8">{{$calculo['tasa_semanal']." %"}}</dd>
                        <dt class="col-sm-4">Comision:</dt>
                        <dd class="col-sm-8">{{$calculo['com']." %"}}</dd>
                        <dt class="col-sm-4">Total:</dt>
                        <dd class="col-sm-8">{{$calculo['tasa_interes_semanal']." %"}}</dd>
                        <dt class="col-sm-4">Nro de cuotas:</dt>
                        <dd class="col-sm-8">{{$calculo['semanas']}}</dd>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        {{-- <dt class="col-sm-7">Tasa de interes 18 semanas:</dt>
                        <dd class="col-sm-5">{{$tasa_interes. " %"}}</dd> --}}
                        {{-- <dt class="col-sm-7">Tasa de interes semanal:</dt>
                        <dd class="col-sm-5">{{$calculo['tasa_interes_semanal']." %"}}</dd> --}}
                        <dt class="col-sm-7">Valor cuota:</dt>
                        <dd class="col-sm-5">{{"S/. ".$calculo['valor_cuota_correcto']}}</dd>
                        <dt class="col-sm-7">Saldo principal:</dt>
                        <dd class="col-sm-5">S/. 0.00 (*)</dd>
                    </div>
                </div>
            </dl>
            <table id="" class="table table-bordered table-striped">
                <thead class="text-center">
                    <th>FECHA</th>
                    <th>#</th>
                    <th>CUOTA</th>
                    <th>PAGO DE CAPITAL</th>
                    <th>INTERES</th>
                    <th>COMISÍON</th>
                    <th>IGV</th>
                    <th>SALDO CAPITAL</th>
                </thead>
                <tbody class="text-center">
                    @php
                        $fecha_pago = \Carbon\Carbon::parse($fecha_pago);;
                    @endphp
                    <tr>
                        <td>{{$fecha_pago->format('d-m-Y')}}</td>
                        <td>1</td>
                        <td>{{"S/. ".$calculo['valor_cuota_correcto']}}</td>
                        <td>{{"S/. ".$calculo['pago_capital']}}</td>
                        <td>{{"S/. ".$calculo['interes']}}</td>
                        <td>{{"S/. ".$calculo['comision']}}</td>
                        <td>{{"S/. ".$calculo['igv']}}</td>
                        <td>{{"S/. ".$calculo['saldo_capital']}}</td>
                    </tr>
                    @php
                        $saldo_capital = $calculo['saldo_capital'];
                        $pago_capital = $calculo['pago_capital'];
                    @endphp
                    @for($i = 2; $i <= $calculo['semanas']; $i++)
                        @php

                            $fecha_pago = $fecha_pago->addDays(7);
                            $cuota = $calculo['valor_cuota_correcto'];
                            $interes = round(($saldo_capital*$calculo['tasa_semanal_porcentaje'])/1.18, 2);
                            $comision = round(($saldo_capital*$calculo['com_porcentaje'])/1.18, 2);
                            $igv = round((round(($saldo_capital*$calculo['tasa_semanal_porcentaje'])/1.18, 2)+round(($saldo_capital*$calculo['com_porcentaje'])/1.18, 2))*0.18, 2);
                            $pago_capital = $cuota-$interes-$comision-$igv;
                            $saldo_capital = $saldo_capital - $pago_capital;

                        @endphp
                        <tr>
                            <td>{{$fecha_pago->format('d-m-Y')}}</td>
                            <td>{{$i}}</td>
                            <td class="pago_cuota">{{"S/. ".$cuota}}</td>
                            <td class="pago_capital">{{"S/. ".$pago_capital}}</td>
                            <td>{{"S/. ".$interes}}</td>
                            <td>{{"S/. ".$comision}}</td>
                            <td>{{"S/. ".$igv}}</td>
                            <td>{{"S/. ".abs(round($saldo_capital, 2))}}</td>
                        </tr>
                    @endfor
                </tbody>

                <tfoot align="center">
                    <tr> 
                        <th colspan="2">!TOTAL!</th>
                        <th id="total_c"></th>
                        <th id="total_pa"></th> 
                    </tr> 
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between col-12">
                <div class="text-center mb-4">
                    <a href="{{ route('admin.solicitudes.index') }}" class="btn btn-lg btn-secondary"><i class="fa-solid fa-check-to-slot mr-2"></i>Regresar</a>
                </div>
                <div class="text-center mb-4">
                    <a href="#" class="btn btn-lg btn-success"><i class="fa-solid fa-print mr-2"></i>Imprimir</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>

    var total_c = 0;
    document.querySelectorAll('.pago_cuota').forEach(function(element) {
        var valor_c = element.innerText.replace('S/. ', '');
        total_c += parseFloat(valor_c);
    });
    document.getElementById('total_c').innerText = 'S/. ' + total_c.toFixed(2);

    var total_pc = 0;
    document.querySelectorAll('.pago_capital').forEach(function(element) {
        var valor_pc = element.innerText.replace('S/. ', '');
        total_pc += parseFloat(valor_pc);
    });
    document.getElementById('total_pa').innerText = 'S/. ' + total_pc.toFixed(2);

    </script>
@stop
