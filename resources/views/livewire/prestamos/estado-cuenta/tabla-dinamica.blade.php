<div> 
    <div class="card-header">
        <ul class="nav nav-pills nav-justified m-3" style="background-color: rgb(230, 230, 230)">
            <li class="nav-item">
                <a class="nav-link {{ $activeButton == '1' ? 'active' : '' }}" href="#" wire:click="mostrarTabla('1')">Estado de Cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeButton == '2' ? 'active' : '' }}" href="#" wire:click="mostrarTabla('2')">Lista de Transacciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeButton == '3' ? 'active' : '' }}" href="#" wire:click="mostrarTabla('3')">Plan de Pago</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeButton == '4' ? 'active' : '' }}" href="#" wire:click="mostrarTabla('4')">Gestion de Cobranza</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        @switch($tabla)
            @case('1')
                <table id="" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Abono</th>
                            <th>Capital</th>
                            <th>Cuotas</th>
                            <th>Interés</th>
                            <th>Comision</th>
                            <th>IGV</th>
                            <th>Moras</th>
                            <th>Fecha de Abono</th>
                            <th>N° Op.</th>
                            <th>Recepc.</th>
                            <th>Moras P.</th>
                            <th>Pago</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" style="font-size: 1vw">
                        @foreach ($cuotas as $cuota)
                        <tr>
                            <td>{{$cuota->numero}}</td>
                            <td>{{\DateTime::createFromFormat('Y-m-d', $cuota->fecha)->format('d-m-Y')}}</td>
                            <td></td>
                            <td>{{"S/ ".$cuota->saldoCapital}}</td>
                            <td>{{"S/ ".$cuota->cuota}}</td>
                            <td>{{"S/ ".$cuota->interes}}</td>
                            <td>{{"S/ ".$cuota->comision}}</td>
                            <td>{{"S/ ".$cuota->igv}}</td>
                            <td>--</td>
                            <td>--/--/--</td>
                            <td>7485</td>
                            <td>--</td>
                            <td></td>
                            @switch($cuota->statusPago)
                                @case(2)
                                    <td class="text-center"><a href="{{ route('admin.registrarpago.edit', ['registrar_pago' => $id, 'cuota_id' => $cuota->id]) }}" class="btn btn-warning"><i class="fa-solid fa-coins"></i></a></td>
                                @break
                                @case(1)
                                    <td class="text-center"><button class="btn btn-success"><i class="fa-solid fa-check"></i></button></td>    
                                @break 
                                @default
                                    <td class="text-center"><a href="{{ route('admin.registrarpago.edit', ['registrar_pago' => $id, 'cuota_id' => $cuota->id]) }}" class="btn btn-danger"><i class="fa-solid fa-sack-dollar"></i></a></td>
                            @endswitch
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @break
            @case('2')
                <table id="" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>Fecha de Creación</th>
                            <th>Fecha Operación</th>
                            <th>Nro Operación</th>
                            <th>Descripción</th>
                            <th>Recepción</th>
                            <th>Balance</th>
                            <th>IGV</th>
                            <th>Saldo Capital</th>
                        </tr>
                    </thead>
                </table>
            @break
            @case('3')
                <table id="" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>Nro.</th>
                            <th>Vencimiento</th>
                            <th>Cuota</th>
                            <th>Interés</th>
                            <th>Capital</th>
                            <th>Comisión</th>
                            <th>IGV</th>
                            <th>Saldo Capital</th>
                        </tr>
                    </thead>
                </table>
            @break
            @case('4')
                <table id="" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>Nro.</th>
                            <th>Estado</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario</th>
                            <th>Ubicación</th>
                        </tr>
                    </thead>
                </table>
            @break
            @default     
        @endswitch
    </div>   
</div>
