<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <a href="{{ route('admin.usuarios.create') }}" class="btn btn-block btn-danger w-25 m-2"><i class="fa-solid fa-user-plus mr-1"></i>Nuevo Usuario</a>
                <button class="btn btn-block btn-success w-25 m-2" wire:click='export'><i class="fa fa-file-excel mr-1"></i>Descargar Patron</button>
                <button class="btn btn-block btn-primary w-25 m-2" wire:click='export1'><i class="fa-solid fa-circle-plus mr-1"></i>Asignar otros conceptos</button>
                <a href="#" class="btn btn-block btn-dark w-25 m-2"><i class="fa-solid fa-file-pen mr-1"></i>Actualizar Status</a>
            </div>
            <div class="d-flex">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar por DNI, Apellidos o Estado">
            </div>
        </div>
        <div class="card-body">
            @if ($usuarios->count())
                <table id="" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th style="cursor: pointer;" wire:click="order('name')">Nombres
                            <!-- Sort -->
                            @if ($sort == 'name')
                                @if ($direction == 'asc')
                                    <i class="fa-solid fa-arrow-down-a-z float-right mt-1"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down-z-a float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort float-right mt-1"></i>
                            @endif</th>
                            <th>Admin</th>
                            <th>Analista</th>
                            <th>JCC</th>
                            <th>Asesor</th>
                            <th>Fecha de Creacion</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>
                                @if($usuario->hasRole('Admin'))
                                    <span class="badge badge-success">Si</span>
                                @else
                                    <span class="badge badge-danger">No</span>
                                @endif   
                            </td>
                            <td>
                                @if($usuario->hasRole('Analista'))
                                    <span class="badge badge-success">Si</span>
                                @else
                                    <span class="badge badge-danger">No</span>
                                @endif   
                            </td>
                            <td>
                                @if($usuario->hasRole('JCC'))
                                    <span class="badge badge-success">Si</span>
                                @else
                                    <span class="badge badge-danger">No</span>
                                @endif   
                            </td>
                            <td>
                                @if($usuario->hasRole('Asesor'))
                                    <span class="badge badge-success">Si</span>
                                @else
                                    <span class="badge badge-danger">No</span>
                                @endif   
                            </td>
                            <td>{{$usuario->created_at}}</td>
                            <td>
                                <a href="{{ route('admin.usuarios.edit', ['usuario' => $usuario->id ]) }}" class="btn btn-success btn-sm"><i class="fas fa-pen-to-square mr-1"></i>Editar Usuario</a>
                                <a href="#" class="btn btn-danger btn-sm" id="btn-eliminar" data-user-id="{{$usuario->id}}" data-user-name="{{$usuario->name}}"><i class="fas fa-user-xmark mr-1"></i>Eliminar Usuario</a>
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

<script>

    document.querySelectorAll('#btn-eliminar').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const userId = event.target.closest('a').dataset.userId;
            const userName = event.target.closest('a').dataset.userName;
            Swal.fire({
                title: '¿Estás seguro?',
                text: `¡No podrás revertir esto! El usuario ${userName} será eliminado permanentemente.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteUser', {userId: userId});
                    Livewire.on('userDeleted', (response) => {
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
