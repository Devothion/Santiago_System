<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex w-full justify-content-around">
                {{-- <div class="row " style="margin-top: 20px;margin-bottom: 20px;margin-left: 10px;">
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #c8eeba;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Habilitado: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">200</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #f2c0c0;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Inhabilitado:</p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">40</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #ecdaae;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Pasivo: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">840</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #dac2f2;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Fallecido: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">385</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #a5e8fd;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Vitalicio: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">985</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #d9d9d9;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Retirado: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">57</p></div>
                </div> --}}
            </div>
            <div class="d-flex">
                <a href="{{ route('admin.solicitudes.create') }}" class="btn btn-block btn-danger w-25 m-2"><i class="fa-solid fa-hand-holding-dollar mr-1"></i>Nueva Solicitud</a>
                <button class="btn btn-block btn-success w-25 m-2" wire:click='export'><i class="fa fa-file-excel mr-1"></i>Descargar Patron</button>
                <button class="btn btn-block btn-primary w-25 m-2" wire:click='export1'><i class="fa-solid fa-circle-plus mr-1"></i>Asignar otros conceptos</button>
                <a href="#" class="btn btn-block btn-dark w-25 m-2"><i class="fa-solid fa-file-pen mr-1"></i>Actualizar Status</a>
            </div>
            <div class="d-flex">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar por DNI o Apellidos">
            </div>
        </div>
        <div class="card-body">

            @if ($prestamos->count())
                <table id="" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th style="cursor: pointer;" wire:click="order('id')">ID 
                            <!-- Sort -->
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-down-1-9 float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-9-1 float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif</th>
                            <th style="cursor: pointer;" wire:click="order('nombre_cliente')">Nombres
                            <!-- Sort -->
                            @if ($sort == 'nombre_cliente')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-down-a-z float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif</th>
                            <th style="cursor: pointer;">DNI
                            <!-- Sort -->
                            @if ($sort == 'nombre_cliente')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-down-1-9 float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-9-1 float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif</th>
                            {{-- <th style="cursor: pointer;" wire:click="order('mon_sol')">Monto
                            <!-- Sort -->
                            @if ($sort == 'mon_sol')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-down-1-9 float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-9-1 float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif</th> --}}
                            <th>Estado</th>
                            <th style="cursor: pointer;" wire:click="order('created_at')">Fecha de Primer Pago
                            <!-- Sort -->
                            @if ($sort == 'created_at')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-down-1-9 float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-9-1 float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($prestamos as $prestamo)
                        <tr>
                            <td>{{$prestamo->id}}</td>
                            <td>{{$prestamo->nombre_cliente}}</td>
                            <td>{{$prestamo->cliente->documento}}</td>
                            <td>
                                @if ($prestamo->estado == 'Por Desembolsar')
                                    <span class="badge badge-success">Por Desembolsar</span>
                                @elseif ($prestamo->estado == 'Vigente')
                                    <span class="badge badge-info">Vigente</span>
                                @elseif ($prestamo->estado == 'Pagado')
                                    <span class="badge badge-warning">Pagado</span>
                                @elseif ($prestamo->estado == 'Moroso')
                                    <span class="badge badge-warning">Moroso</span>
                                @else
                                    <span class="badge badge-danger">Cancelado</span>
                                @endif
                                    
                            </td>
                            <td>{{$prestamo->solicitud->fech_ate}}</td>
                            <td>
                                <a href="{{ route('admin.registrarpago.create2', ['solicitud_id' => $prestamo->solicitud->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-dollar-sign mr-1"></i>Registrar Pagos</a>
                                <div class="btn-group dropleft">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu">
                                        @if($prestamo->estado !== 'Vigente')
                                            <a href="#" class="dropdown-item" id="btn-desembolsar" data-prestamo-id="{{$prestamo->id}}"><i class="fa-solid fa-sack-dollar mr-1"></i>Desembolsar</a>
                                        @endif
                                        <a href="{{ route('admin.prestamos.show', ['prestamo' => $prestamo->solicitud->id ]) }}" class="dropdown-item"><i class="far fa-eye mr-1"></i>Estado de Cuenta</a>
                                        <a href="#" class="dropdown-item"><i class="fas fa-file-pdf mr-1"></i>Control de Pagos</a>
                                        <a href="#" class="dropdown-item"><i class="fas fa-file-pdf mr-1"></i>Cronograma</a>
                                        <a href="{{ route('admin.registrarpago.create2', ['solicitud_id' => $prestamo->solicitud->id]) }}" class="dropdown-item"><i class="fas fa-dollar-sign mr-1"></i>Registrar Pagos</a>
                                        <a href="{{ route('admin.registrarpagolibre.create', ['solicitud_id' => $prestamo->solicitud->id]) }}" class="dropdown-item"><i class="fas fa-dollar-sign mr-1"></i>Registrar Pago Libre</a>
                                        <a href="{{ route('admin.gestioncobranza.create', ['solicitud_id' => $prestamo->solicitud->id]) }}" class="dropdown-item"><i class="fas fa-chart-simple mr-1"></i>Gestion Cobranza</a> 
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right mt-3">
                    {{$prestamos->links()}}
                </div>
            @else
                <div class="text-center">
                    <p class="font-weight-bold text-muted">No hemos encontrado algun registro coincidente</p>
                </div>
            @endif
            
        </div>
    </div>  
</div>

<script>

    document.querySelectorAll('#btn-desembolsar').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const prestamoId = event.target.closest('a').dataset.prestamoId;
            Swal.fire({
                title: '¿Estás seguro?',
                text: `¡Confima la operacion! Vamos a desembolsar el prestamo ${prestamoId}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, desembolsar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('desembolsarPrestamo', {prestamoId: prestamoId});
                    Livewire.on('prestamoDesembolsado', (response) => {
                        let data = response[0]; 
                        Swal.fire({
                            icon: data.icon,
                            title: data.title,
                            text: data.text,
                            showConfirmButton: true,
                        });
                    });
                }
            });
        });
    });

</script>
