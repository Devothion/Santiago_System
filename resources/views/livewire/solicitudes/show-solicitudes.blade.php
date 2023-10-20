<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex w-full justify-content-around">
                <div class="row " style="margin-top: 20px;margin-bottom: 20px;margin-left: 10px;">
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #5cb85c;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Aprobado: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">{{$cant_aprobado}}</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #5bc0de;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">En Analisis:</p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">{{$cant_analisis}}</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #f0ad4e;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">En Espera: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">{{$cant_espera}}</p></div>
                    <div style="display: flex;padding: 12px;width: 150px;background-color: #d9534f;border-radius: 10px;height: 50px;color: black;justify-content: center;margin-right: 10px;text-transform: uppercase;  padding-top: 17px !important;"><p style="font-size: 10pt;">Finalizado: </p> <p style="margin-left: 5px;font-weight: 600;font-size: 16pt;margin-top: -9px;">{{$cant_finalizado}}</p></div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('admin.solicitudes.create') }}" class="btn btn-block btn-danger w-25 m-2"><i class="fa-solid fa-hand-holding-dollar mr-1"></i>Nueva Solicitud</a>
                <button class="btn btn-block btn-success w-25 m-2" wire:click='export'><i class="fa fa-file-excel mr-1"></i>Descargar Patron</button>
            </div>
            <div class="d-flex">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar por DNI, Apellidos o Estado">
            </div>
        </div>
        <div class="card-body">

            @if ($solicitudes->count())
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
                            <th style="cursor: pointer;" wire:click="order('cliente')">Nombres
                            <!-- Sort -->
                            @if ($sort == 'cliente')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-down-a-z float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif</th>
                            <th style="cursor: pointer;" wire:click="order('mon_sol')">Monto
                            <!-- Sort -->
                            @if ($sort == 'mon_sol')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-down-1-9 float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-9-1 float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif</th>
                            <th>Estado</th>
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
                        @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td>{{$solicitud->id}}</td>
                            <td>{{$solicitud->cliente}}</td>
                            <td>S/. {{$solicitud->mon_sol}}</td>
                            <td>
                                @if ($solicitud->estado == 'Aprobado')
                                    <span class="badge badge-success">Aprobado</span>
                                @elseif ($solicitud->estado == 'En Analisis')
                                    <span class="badge badge-info">En Analisis</span>
                                @elseif ($solicitud->estado == 'En Espera')
                                    <span class="badge badge-warning">En Espera</span>
                                @else
                                    <span class="badge badge-danger">Finalizado</span>
                                @endif
                                    
                            </td>
                            <td>{{$solicitud->fech_ate}}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('admin.solicitudes.edit', ['solicitude' => $solicitud->id ]) }}" class="dropdown-item"><i class="far fa-pen-to-square mr-1"></i>Editar</a>
                                        <a href="{{ route('admin.solicitudes.show', ['solicitude' => $solicitud->id ]) }}" class="dropdown-item"><i class="fas fa-file-pdf mr-1"></i>Ver Cronograma</a>
                                        <a href="#" class="dropdown-item"><i class="fas fa-trash mr-1"></i>Eliminar</a>
                                        <a href="#" class="dropdown-item"><i class="fas fa-money-bills mr-1"></i>Fondo Provicional</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <!-- -------------------------------------------------------------------------------------------------------- -->
                        <!-- -------------------------------------------------------------------------------------------------------- -->
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
