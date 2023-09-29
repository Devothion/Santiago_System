@extends('adminlte::page')

@section('title', 'Nueva Sucursal')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Sucursal</h1>
@stop

@section('content')

    <!-- ------------------------------------- -->
    <!-- FALTAN ARREGLAR LOS ID's Y LOS NAME's -->
    <!-- FALTAN ARREGLAR LA ETIQUETA FORM ------->
    <!-- ------------------------------------- -->
    <form action="{{ route('admin.sucursales.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nombreSucursal">Nombre de Sucursal</label>
                            <input type="text" class="form-control" name="nombreSucursal" id="nombreSucursal">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="departamento">Departamento</label>
                            <select class="form-control" id="departamento" name="departamento">
                                <option value="" selected>Selecciona</option>
                                @foreach ($departamentos as $departamento)
                                    <option value="{{$departamento->id}}">{{$departamento->departamento}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            <select class="form-control" id="provincia" name="provincia">
                                <option value="" selected>Selecciona</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="distrito">Distrito</label>
                            <select class="form-control" id="distrito" name="distrito">
                                <option value="" selected>Selecciona</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('admin.sucursales.index') }}" class="btn btn-lg btn-dark mr-4"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                            <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    
@stop

@section('js')
    <script>

        const departamento = document.getElementById('departamento')
        const provincia = document.getElementById('provincia')
        const zona = document.getElementById('zona')
        const tZona = document.getElementById('tZona')

        departamento.addEventListener('change', async (e)=> {
            if (e.target.value == '') {
                provincia.innerHTML = `<option value=''>Selecciona</option>`
                distrito.innerHTML = `<option value=''>Selecciona</option>`
                zona.innerHTML = `<option value=''>Selecciona</option>`
                tZona.innerHTML = `<option value=''>Selecciona</option>`
            } else {
                const response = await fetch(`/api/departamento/${e.target.value}/provincias`)
                const data = await response.json();
                let options = '';
                data.forEach(element => {
                    options = options + `<option value='${element.id}'>${element.provincia}</option>`
                })
                provincia.innerHTML = options
                provincia.addEventListener('change', async (e)=> {
                    const response = await fetch(`/api/provincia/${e.target.value}/distritos`)
                    const data = await response.json();
                    let options = '';
                    data.forEach(element => {
                        options = options + `<option value='${element.id}'>${element.distrito}</option>`
                    })
                    distrito.innerHTML = options
                    
                    distrito.addEventListener('change', async (e)=> {
                        const response = await fetch(`/api/distrito/${e.target.value}/zonas`)
                        const data = await response.json();
                        let options_z = '';
                        let options_tz = '';
                        data.forEach(element_z => {
                            options_z = options_z + `<option value='${element_z.id}'>${element_z.zona}</option>`
                        })
                        data.forEach(element_tz => {
                            options_tz = options_tz + `<option value='${element_tz.id}'>${element_tz.tipo}</option>`
                        })
                        zona.innerHTML = options_z
                        tZona.innerHTML = options_tz
                    })

                    // Dispara el evento change para la distrito
                    var event_d = new Event('change');
                    distrito.dispatchEvent(event_d);

                })

                // Dispara el evento change para la provincia
                var event_p = new Event('change');
                provincia.dispatchEvent(event_p);
                

                
            }
        })

    </script>
@endsection