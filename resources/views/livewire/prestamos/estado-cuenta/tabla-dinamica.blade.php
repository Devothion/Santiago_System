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
                            <th>Abono</th>
                            <th>Capital</th>
                            <th>Interés</th>
                            <th>Comision</th>
                            <th>IGV</th>
                            <th>Moras</th>
                            <th>Fecha de Abono</th>
                            <th>N° Op.</th>
                            <th>Recepc.</th>
                            <th>Moras P.</th>
                            <th>Monto Cuota</th>
                        </tr>
                    </thead>
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
