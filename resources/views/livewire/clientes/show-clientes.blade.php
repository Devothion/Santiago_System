<div>
    <div class="card">
        <div class="card-header">
            {{-- <div class="d-flex w-full justify-content-around">
                <div class="row " style="margin-top: 20px;margin-bottom: 20px;margin-left: 10px;">
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #c8eeba;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Habilitado: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">200</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #f2c0c0;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Inhabilitado:</p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">40</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #ecdaae;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Pasivo: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">840</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #dac2f2;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Fallecido: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">385</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #a5e8fd;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Vitalicio: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">985</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #d9d9d9;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Retirado: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">57</p></div>
                </div>
            </div> --}}
            <div class="d-flex">
                <a href="{{ route('admin.clientes.create') }}" class="btn btn-block btn-danger w-25 m-2"><i class="fa-solid fa-user-plus mr-1"></i>Nuevo Cliente</a>
                <button class="btn btn-block btn-success w-25 m-2" wire:click='export'><i class="fa fa-file-excel mr-1"></i>Descargar Patron</button>
                <button class="btn btn-block btn-primary w-25 m-2" wire:click='export1'><i class="fa-solid fa-circle-plus mr-1"></i>Asignar otros conceptos</button>
                <a href="#" class="btn btn-block btn-dark w-25 m-2"><i class="fa-solid fa-file-pen mr-1"></i>Actualizar Status</a>
            </div>
            <div class="d-flex">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar por DNI, Apellidos o Estado">
            </div>
        </div>
        <div class="card-body">

            @if ($clientes->count())
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
                            <th style="cursor: pointer;" wire:click="order('nombres')">Nombres
                            <!-- Sort -->
                            @if ($sort == 'nombres')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-down-a-z float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif</th>
                            <th style="cursor: pointer;" wire:click="order('documento')">DNI
                            <!-- Sort -->
                            @if ($sort == 'documento')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-down-1-9 float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-9-1 float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif</th>
                            <th style="cursor: pointer;" wire:click="order('created_at')">Fecha de Creacion
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
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nombres}}</td>
                            <td>{{$cliente->documento}}</td>
                            <td>{{$cliente->created_at}}</td>
                            <td>
                                <a href="{{ route('admin.clientes.edit', ['cliente' => $cliente->id ]) }}" class="btn btn-success btn-sm"><i class="fa-solid fa-user-pen mr-1"></i>Editar</a>
                                <button type="button" class="btn btn-warning btn-sm"><i class="fa-solid fa-money-bill-wave mr-1"></i>Ver Creditos</button>
                                <button type="button" class="btn btn-info btn-sm"><i class="fa-solid fa-file-invoice-dollar mr-1"></i>Nueva Solicitud</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            @else
                <div class="text-center">
                    <p class="font-weight-bold text-muted">No hemos encontrado algun registro coincidente</p>
                </div>
            @endif
            
        </div>
    </div>  
</div>
