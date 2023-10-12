@extends('adminlte::page')

@section('title', 'Nuevo Cliente')

@section('content_header')
    <h1 class="m-0 text-dark">Editar cliente</h1>
@stop

@section('content')
    <!-------------------------------------------------------->
    <!-- NO OLVIDAR QUE TODO ESTO TIENE QUE ESTAR DENTRO DE -->
    <!-- DE UNA ETIQUETA FORM PARA QUE SE MANEJEN LOS DATOS -->
    <!-------------------------------------------------------->
    <form action="{{ route('admin.clientes.update', ['cliente' => $cliente->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <div class="text-center">
                                <img src="{{ asset('storage/'. $cliente->imagen) }}" class="rounded mx-auto d-block" id="img" alt="userPhoto" style="height: 150px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="form-group mr-1">
                                <div class="adjuntar-foto">
                                    <label for="file" class="btn btn-info"><i class="fa fa-upload mr-1"></i>Seleccionar foto</label>
                                    <input id="file" type="file" name="file" style="display: none;" requerid>
                                </div>
                            </div>
                            <div class="form-group ml-1">
                                <a data-toggle="modal" data-target="#verFoto-modal" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass-plus mr-1"></i><strong>Visualizar foto</strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="sucursal">Sucursal</label>
                            <select class="form-control" id="sucursal" name="sucursal">
                                <option value=""{{ old('sucursal', $cliente->sucursal) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}"{{ old('sucursal', $cliente->sucursal) == $sucursal->id ? ' selected' : '' }}>{{ $sucursal->sucursal }}</option>
                                @endforeach                            
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="jcc">JCC</label>
                            <select class="form-control" id="jcc" name="jcc">
                                <option value=""{{ old('jcc', $cliente->jcc) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($jccs as $jcc)
                                    <option value="{{ $jcc->id }}"{{ old('sucursal', $cliente->jcc) == $jcc->id ? ' selected' : '' }}>{{ $jcc->nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="asesorCredito">Asesor de Credito</label>
                            <select class="form-control" id="asesorCredito" name="asesorCredito">
                                <option value=""{{ old('asesorCredito', $cliente->asesor) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($asesores as $asesor)
                                    <option value="{{ $asesor->id }}"{{ old('sucursal', $cliente->asesor) == $asesor->id ? ' selected' : '' }}>{{ $asesor->nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nDocumento">Numero de documento</label>
                            <input type="number" class="form-control" name="nDocumento" id="nDocumento" value="{{$cliente->documento}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" value="{{$cliente->nombres}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="aPaterno">Apellido Paterno</label>
                            <input type="text" class="form-control" name="aPaterno" id="aPaterno" value="{{$cliente->ape_pat}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="aMaterno">Apellido Materno</label>
                            <input type="text" class="form-control" name="aMaterno" id="aMaterno" value="{{$cliente->ape_mat}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" name="telefono" id="telefono" value="{{$cliente->telefono}}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="departamento">Departamento</label>
                            <select class="form-control" id="departamento" name="departamento">
                                <option value=""{{ old('sucursal', $cliente->departamento) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}"{{ old('sucursal', $cliente->departamento) == $departamento->id ? ' selected' : '' }}>{{ $departamento->departamento }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            <select class="form-control" id="provincia" name="provincia">
                                <option value=""{{ old('sucursal', $cliente->provincia) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($provincias as $provincia)
                                    <option value="{{ $provincia->id }}"{{ old('sucursal', $cliente->provincia) == $provincia->id ? ' selected' : '' }}>{{ $provincia->provincia }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="distrito">Distrito</label>
                            <select class="form-control" id="distrito" name="distrito">
                                <option value=""{{ old('sucursal', $cliente->distrito) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($distritos as $distrito)
                                    <option value="{{ $distrito->id }}"{{ old('sucursal', $cliente->distrito) == $distrito->id ? ' selected' : '' }}>{{ $distrito->distrito }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="zona">Zona</label>
                            <select class="form-control" id="zona" name="zona">
                                <option value=""{{ old('sucursal', $cliente->zona) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($zonas as $zona)
                                    <option value="{{ $zona->id }}"{{ old('sucursal', $cliente->zona) == $zona->id ? ' selected' : '' }}>{{ $zona->zona }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="tZona">Tipo de Zona</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="tZona" name="tZona">
                                    <option value=""{{ old('sucursal', $cliente->zona) == '' ? ' selected' : '' }}>Selecciona</option>
                                    @foreach ($zonas as $zona)
                                        <option value="{{ $zona->id }}"{{ old('sucursal', $cliente->zona) == $zona->id ? ' selected' : '' }}>{{ $zona->tipo }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <a data-toggle="modal" data-target="#agregarZona-modal" class="btn btn-outline-info"><i class="fa-solid fa-circle-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="nLotes">Numero de lote</label>
                            <input type="text" class="form-control" name="nLotes" id="nLotes" value="{{$cliente->nlote}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="direcDomicilio">Direccion de domicilio</label>
                            <input type="text" class="form-control" name="direcDomicilio" id="direcDomicilio" value="{{$cliente->direccion}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="referDomiciliaria">Referencia domiciliaria</label>
                            <input type="text" class="form-control" name="referDomiciliaria" id="referDomiciliaria" value="{{$cliente->referencia}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tCuenta">Tipo de Cuenta</label>
                            <select class="form-control" id="tCuenta" name="tCuenta">
                                <option value=""{{ old('sucursal', $cliente->tipoCuenta) == '' ? ' selected' : '' }}>Selecciona</option>
                                @foreach ($tipoCuentas as $tipoCuenta)
                                    <option value="{{ $tipoCuenta->id }}"{{ old('sucursal', $cliente->tipoCuenta) == $tipoCuenta->id ? ' selected' : '' }}>{{ $tipoCuenta->tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="aval">Aval</label>
                            <select class="form-control" id="aval" name="aval">
                                @if($cliente->aval == '0')
                                    <option value="0" selected>No</option>
                                    <option value="1">Si</option>
                                @else
                                    <option value="0">No</option>
                                    <option value="1" selected>Si</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mt-2" id="finanzas-section" hidden>
                        <h3 class="text-secondary"><strong>FINANZAS</strong></h3>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="entidadFinanciera">Entidad Financiera</label>
                                    <select class="form-control" id="entidadFinanciera" name="entidadFinanciera">
                                        <option value=""{{ old('sucursal', $cliente->entidad) == '' ? ' selected' : '' }}>Selecciona</option>
                                        @foreach ($entBancarias as $entBancaria)
                                            <option value="{{ $entBancaria->id }}"{{ old('sucursal', $cliente->entidad) == $entBancaria->id ? ' selected' : '' }}>{{ $entBancaria->banco }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="f_nCuenta">Numero de cuenta</label>
                                    <input type="number" class="form-control" name="f_nCuenta" id="f_nCuenta" value="{{$cliente->cuentafi}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2" id="cuenta-terceros-section" hidden>
                        <h3 class="text-secondary"><strong>CUENTA TERCEROS</strong></h3>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ct_eFinanciera">Entidad Financiera</label>
                                    <select class="form-control" id="ct_eFinanciera" name="ct_eFinanciera">
                                        <option value=""{{ old('sucursal', $cliente->entidadter) == '' ? ' selected' : '' }}>Selecciona</option>
                                        @foreach ($entBancarias as $entBancaria)
                                            <option value="{{ $entBancaria->id }}"{{ old('sucursal', $cliente->entidadter) == $entBancaria->id ? ' selected' : '' }}>{{ $entBancaria->banco }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ct_nCuenta">Numero de cuenta</label>
                                    <input type="number" class="form-control" name="ct_nCuenta" id="ct_nCuenta" value="{{$cliente->cuentater}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ct_Titular">Titular</label>
                                    <input type="text" class="form-control" name="ct_Titular" id="ct_Titular" value="{{$cliente->titularter}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2" id="aval-section" hidden>
                        <h3 class="text-secondary"><strong>AVAL</strong></h3>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_nDocumento">Numero de documento</label>
                                    <input type="number" class="form-control" name="av_nDocumento" id="av_nDocumento" value="{{$cliente->documentoav}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_nombres">Nombres</label>
                                    <input type="text" class="form-control" name="av_nombres" id="av_nombres" value="{{$cliente->nombresav}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_aPaterno">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="av_aPaterno" id="av_aPaterno" value="{{$cliente->ape_patav}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_aMaterno">Apellido Materno</label>
                                    <input type="text" class="form-control" name="av_aMaterno" id="av_aMaterno" value="{{$cliente->ape_matav}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_direcDomicilio">Direccion de domicilio</label>
                                    <input type="text" class="form-control" name="av_direcDomicilio" id="av_direcDomicilio" value="{{$cliente->direccionav}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_telefono">Telefono</label>
                                    <input type="number" class="form-control" name="av_telefono" id="av_telefono" value="{{$cliente->celularav}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="av_observaciones">Observaciones</label>
                                    <textarea class="form-control" id="av_observaciones" name="av_observaciones" rows="3">{{$cliente->observ}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('admin.clientes.index') }}" class="btn btn-lg btn-dark"><i class="fa-solid fa-right-from-bracket mr-1"></i>Cancelar</a>
                            <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-floppy-disk mr-1"></i>Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="verFoto-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Previsualizar foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ asset('storage/'. $cliente->imagen) }}" class="rounded mx-auto d-block" id="view-img" alt="userPhoto" style="height: 400px;">
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    @livewire('clientes.zona.create-zona')

@stop

@section('js')

    <script>
        // TODAVIA FALTAN LAS FUNCIONES PARA PREVISUALIZAR LAS FOTOS //
        $('#tCuenta').change(function() {
            var x = document.getElementById('cuenta-terceros-section')
            var y = document.getElementById('finanzas-section')
            let estado = $('#tCuenta').val();
            console.log('Estas seleccionando: '+estado);
            switch (estado) {
                case '1':
                    x.setAttribute('hidden', true);
                    y.removeAttribute('hidden');
                    break
                case '2':
                    x.removeAttribute('hidden');
                    y.setAttribute('hidden', true);
                    break;
                default:
                    x.setAttribute('hidden', true);
                    y.setAttribute('hidden', true);
                    break;
            }
        });
        $('#aval').change(function() {
            var z = document.getElementById('aval-section');
            let estado = $('#aval').val();
            if (estado == 1) {
                z.removeAttribute('hidden');
            } else {
                z.setAttribute('hidden', true);
            }
        });

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

        const defaultFile = 'https://th.bing.com/th/id/OIP.SZEx8juvNTfQweNxIMGUxgHaHa?pid=ImgDet&rs=1';

        const file = document.getElementById('file');
        const img = document.getElementById('img');
        const viewimg = document.getElementById('view-img');
        file.addEventListener( 'change', e => {
        if( e.target.files[0] ){
            const reader = new FileReader( );
            reader.onload = function( e ){
            img.src = e.target.result;
            viewimg.src = e.target.result;
            }
            reader.readAsDataURL(e.target.files[0])
        }else{
            img.src = defaultFile;
            viewimg.src = defaultFile;
        }
        });


        // Escucha el evento 'change' del input en el formulario de clientes
        document.getElementById('distrito').addEventListener('change', function() {
            // Obtiene el valor del input
            var valorInptuDistrito = this.value;
            var nombreInputDitrito = this.options[this.selectedIndex].text;
            // Asigna el valor al input en el formulario de crear zonas
            document.getElementById('distritoZona_id').value = valorInptuDistrito;
            document.getElementById('distritoZona').value = nombreInputDitrito;
        });
    </script>

@stop