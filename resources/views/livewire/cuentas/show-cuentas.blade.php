<div>
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
                    <a href="{{ route('admin.cuentas.create') }}" class="btn btn-block btn-danger w-25 m-2"><i class="fa-solid fa-square-plus mr-1"></i>Nueva Cuenta</a>
                    <button class="btn btn-block btn-success w-25 m-2" wire:click='export'><i class="fa fa-file-excel mr-1"></i>Descargar Patron</button>
                    <button class="btn btn-block btn-primary w-25 m-2" wire:click='export1'><i class="fa-solid fa-circle-plus mr-1"></i>Asignar otros conceptos</button>
                    <a href="#" class="btn btn-block btn-dark w-25 m-2"><i class="fa-solid fa-file-pen mr-1"></i>Actualizar Status</a>
                </div>
                <div class="d-flex">
                    <input type="text" class="form-control" placeholder="Buscar por DNI, Apellidos o Estado">
                </div>
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>Entidad Bancaria</th>
                            <th>Numero de Cuenta</th>
                            <th>Codigo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($cuentas as $cuenta)
                        <tr>
                            <td>{{$cuenta->entidadBancaria->banco}}</td>
                            <td>{{$cuenta->numero_cuenta}}</td>
                            <td>{{$cuenta->codigo}}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- PODRIAMOS PONER DISTINTOS COLORES DE TEXTO A LAS OPCIONES PARA UN ESTILO (TEXT-DANGER) -->
                                        <a href="{{ route('admin.cuentas.edit', [$cuenta->id]) }}" class="dropdown-item"><i class="fas fa-pen-to-square mr-1"></i>Editar Cuenta</a>
                                        <a href="#" class="dropdown-item"><i class="fas fa-trash mr-1"></i>Eliminar Cuenta</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
    
    
</div>
