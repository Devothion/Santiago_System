@extends('adminlte::page')

@section('title', 'Nuevo Cliente')

@section('content_header')
    <h1 class="m-0 text-dark">Crear cliente</h1>
@stop

@section('content')
    <!-------------------------------------------------------->
    <!-- FALTA CORREGIR SUCURSALES EN LOS BUCLES DE SELECTC -->
    <!-- TODOS DICES SUCURSALES Y ESO DEBE CAMBIEN EN TERNA -->
    <!-------------------------------------------------------->
    <form action="{{ route('admin.clientes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <div class="text-center">
                                <img src="https://th.bing.com/th/id/OIP.SZEx8juvNTfQweNxIMGUxgHaHa?pid=ImgDet&rs=1" class="rounded mx-auto d-block" id="img" alt="userPhoto" style="height: 150px;">
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
                                <option value="" selected>Selecciona</option>
                                @foreach ($sucursales as $sucursal)
                                    <option value="{{$sucursal->id}}">{{$sucursal->sucursal}}</option>
                                @endforeach                            
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="jcc">JCC</label>
                            <select class="form-control" id="jcc" name="jcc">
                                <option value="" selected>Selecciona</option>
                                @foreach ($jccs as $jcc)
                                    <option value="{{$jcc->id}}">{{$jcc->codigo.' '.$jcc->nombres}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="asesorCredito">Asesor de Credito</label>
                            <select class="form-control" id="asesorCredito" name="asesorCredito">
                                <option value="" selected>Selecciona</option>
                                @foreach ($asesores as $asesor)
                                    <option value="{{$asesor->id}}">{{$asesor->codigo.' '.$asesor->nombres}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nDocumento">Numero de documento</label>
                            <input type="number" class="form-control" name="nDocumento" id="nDocumento">
                            <div class="valid-feedback">
                                DNI Valido!
                            </div>
                            <div class="invalid-feedback">
                                DNI Invalido!
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="aPaterno">Apellido Paterno</label>
                            <input type="text" class="form-control" name="aPaterno" id="aPaterno">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="aMaterno">Apellido Materno</label>
                            <input type="text" class="form-control" name="aMaterno" id="aMaterno">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" name="telefono" id="telefono">
                        </div>
                    </div>
                    <div class="col-3">
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
                    <div class="col-3">
                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            <select class="form-control" id="provincia" name="provincia">
                                <option value="" selected>Selecciona</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="distrito">Distrito</label>
                            <select class="form-control" id="distrito" name="distrito">
                                <option value="" selected>Selecciona</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="zona">Zona</label>
                            <select class="form-control" id="zona" name="zona">
                                <option value="" selected>Selecciona</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="tZona">Tipo de Zona</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="tZona" name="tZona">
                                    <option value="" selected>Selecciona</option>
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
                            <input type="text" class="form-control" name="nLotes" id="nLotes">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="direcDomicilio">Direccion de domicilio</label>
                            <input type="text" class="form-control" name="direcDomicilio" id="direcDomicilio">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="referDomiciliaria">Referencia domiciliaria</label>
                            <input type="text" class="form-control" name="referDomiciliaria" id="referDomiciliaria">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tCuenta">Tipo de Cuenta</label>
                            <select class="form-control" id="tCuenta" name="tCuenta">
                                <option selected>Selecciona</option>
                                <option value="1">Cuenta Propia</option>
                                <option value="2">Cuenta de Terceros</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="aval">Aval</label>
                            <select class="form-control" id="aval" name="aval">
                                <option value="0" selected>No</option>
                                <option value="1">Si</option>
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
                                        <option value="" selected>Selecciona</option>
                                        @foreach ($entBancarias as $entBancaria)
                                            <option value="{{$entBancaria->id}}">{{$entBancaria->banco}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="f_nCuenta">Numero de cuenta</label>
                                    <input type="number" class="form-control" name="f_nCuenta" id="f_nCuenta">
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
                                        <option value="" selected>Selecciona</option>
                                        @foreach ($entBancarias as $entBancaria)
                                            <option value="{{$entBancaria->id}}">{{$entBancaria->banco}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ct_nCuenta">Numero de cuenta</label>
                                    <input type="number" class="form-control" name="ct_nCuenta" id="ct_nCuenta">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ct_Titular">Titular</label>
                                    <input type="text" class="form-control" name="ct_Titular" id="ct_Titular">
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
                                    <input type="number" class="form-control" name="av_nDocumento" id="av_nDocumento">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_nombres">Nombres</label>
                                    <input type="text" class="form-control" name="av_nombres" id="av_nombres">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_aPaterno">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="av_aPaterno" id="av_aPaterno">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_aMaterno">Apellido Materno</label>
                                    <input type="text" class="form-control" name="av_aMaterno" id="av_aMaterno">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_direcDomicilio">Direccion de domicilio</label>
                                    <input type="text" class="form-control" name="av_direcDomicilio" id="av_direcDomicilio">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="av_telefono">Telefono</label>
                                    <input type="number" class="form-control" name="av_telefono" id="av_telefono">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="av_observaciones">Observaciones</label>
                                    <textarea class="form-control" id="av_observaciones" name="av_observaciones" rows="3"></textarea>
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
                        <img src="https://th.bing.com/th/id/OIP.SZEx8juvNTfQweNxIMGUxgHaHa?pid=ImgDet&rs=1" class="rounded mx-auto d-block" id="view-img" alt="userPhoto" style="height: 400px;">
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <div id="agregarZona-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="#" id="agregarZona-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingresar nueva zona</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12" hidden>
                                <div class="form-group">
                                    <label for="distritoZona_id">Distrito ID</label>
                                    <input type="text" class="form-control" name="distritoZona_id" id="distritoZona_id" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="distritoZona">Distrito</label>
                                    <input type="text" class="form-control" name="distritoZona" id="distritoZona" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nombreZona">Ingrese el nombre de la zona</label>
                                    <input type="text" class="form-control" name="nombreZona" id="nombreZona">
                                    <div class="valid-feedback">
                                        Zona valida!
                                    </div>
                                    <div class="invalid-feedback errorZona">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tipoZona">Tipo de zona</label>
                                    <div class="input-group">
                                        <select class="custom-select" id="tipoZona" name="tipoZona">
                                            <option value="" selected>Selecciona</option>
                                            @foreach ($zonas as $zona)
                                                <option value="{{$zona->tipo}}">{{$zona->tipo}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-info" id="btnNuevoTipoZona"><i class='fa-solid fa-circle-plus'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="nuevoTipoZona-section">
                                <div class="form-group">
                                    <label for="nuevoTipoZona">Ingrese el tipo de zona</label>
                                    <input type="text" class="form-control" name="nuevoTipoZona" id="nuevoTipoZona">
                                    <div class="valid-feedback">
                                        Tipo de zona valida!
                                    </div>
                                    <div class="invalid-feedback errorTipoZona">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

        // Obtén el elemento input y el elemento de feedback una vez en lugar de varias veces
        var inputElement = $('#nDocumento');
        var feedbackElement = $('.invalid-feedback');

        inputElement.on('input', function() {
            var documento = $(this).val();

            $.ajax({
                url: "{{ route('validar-dni') }}",
                method: 'post',
                data: {
                    documento: documento,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Usa jQuery para agregar la clase y cambiar el mensaje de feedback
                    inputElement.removeClass('is-invalid');
                    inputElement.addClass('is-valid');
                    //feedbackElement.text('DNI Valido!');
                    console.log(response.mensaje);
                },
                error: function(response) {
                    if (response.responseJSON.errors && response.responseJSON.errors.documento) {
                        // Usa jQuery para remover la clase y cambiar el mensaje de feedback
                        inputElement.removeClass('is-valid');
                        inputElement.addClass('is-invalid');
                        feedbackElement.text(response.responseJSON.errors.documento[0]);
                        console.log(response.responseJSON.errors.documento[0]);
                    }
                },
            });
        });

        // Obtén el elemento input y el elemento de feedback una vez en lugar de varias veces
        var nombreZona = $('#nombreZona');
        var errorZona = $('.errorZona');

        nombreZona.on('input', function() {
            var zona = $(this).val();
            var distrito_id = $('#distrito').val();

            $.ajax({
                url: "{{ route('validar-zona') }}",
                method: 'post',
                data: {
                    zona: zona,
                    distrito_id: distrito_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Usa jQuery para agregar la clase y cambiar el mensaje de feedback
                    nombreZona.removeClass('is-invalid');
                    nombreZona.addClass('is-valid');
                    //errorZona.text('DNI Valido!');
                    console.log(response.mensaje);
                },
                error: function(response) {
                    if (response.responseJSON.errors && response.responseJSON.errors.zona) {
                        // Usa jQuery para remover la clase y cambiar el mensaje de feedback
                        nombreZona.removeClass('is-valid');
                        nombreZona.addClass('is-invalid');
                        errorZona.text(response.responseJSON.errors.zona[0]);
                        console.log(response.responseJSON.errors.zona[0]);
                    }
                },
            });
        });


        $('#agregarZona-form').on('submit', function(e) {
            // Previene la acción por defecto del formulario (recargar la página)
            e.preventDefault();

            // Obtiene los datos del formulario
            var formData = $(this).serialize();
            formData += '&_token=' + '{{ csrf_token() }}';
            // Envía los datos al servidor con AJAX
            $.ajax({
                url: "{{ route('admin.zonas.store') }}",  // Reemplaza esto con la URL de tu servidor
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Si la solicitud fue exitosa...

                    // Cierra el modal
                    $('#agregarZona-modal').modal('hide');

                    // Actualiza el formulario principal con los nuevos datos
                    $('#zona').append(new Option(response.zona, response.zona, true, true));
                    $('#tZona').append(new Option(response.tipo, response.tipo, true, true));

                    // Limpia el formulario
                    $('#agregarZona-form')[0].reset();
                    $('#nombreZona').removeClass('is-valid');
                    $('#nombreZona').removeClass('is-invalid');
                    $('#nuevoTipoZona').removeClass('is-valid');
                    $('#nuevoTipoZona').removeClass('is-invalid');
                    var valorInputDistrito = $('#distrito').val();
                    $('#distritoZona_id').val(valorInputDistrito);
                    var nombreInputDitrito = $('#distrito option:selected').text();
                    $('#distritoZona').val(nombreInputDitrito);
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Si hubo un error...

                    // Muestra un mensaje de error
                    console.error('Error: ' + textStatus + ': ' + errorThrown);
                }
            });
        });

        $('#nuevoTipoZona-section').hide();

        $('#btnNuevoTipoZona').click(function () {
            $('#nuevoTipoZona-section').toggle();
        })

        // Obtén el elemento input y el elemento de feedback una vez en lugar de varias veces
        var nuevoTipoZona = $('#nuevoTipoZona');
        var errorTipoZona = $('.errorTipoZona');

        nuevoTipoZona.on('input', function() {
            var tipo = $(this).val();

            $.ajax({
                url: "{{ route('validar-tipozona') }}",
                method: 'post',
                data: {
                    tipo: tipo,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Usa jQuery para agregar la clase y cambiar el mensaje de feedback
                    nuevoTipoZona.removeClass('is-invalid');
                    nuevoTipoZona.addClass('is-valid');
                    if ($('#nuevoTipoZona').val() === "") {
                        $('#nuevoTipoZona').removeClass('is-valid');
                    }
                    //errorTipoZona.text('DNI Valido!');
                    
                    console.log(response.mensaje);
                },
                error: function(response) {
                    if (response.responseJSON.errors && response.responseJSON.errors.tipo) {
                        // Usa jQuery para remover la clase y cambiar el mensaje de feedback
                        nuevoTipoZona.removeClass('is-valid');
                        nuevoTipoZona.addClass('is-invalid');
                        errorTipoZona.text(response.responseJSON.errors.tipo[0]);
                        console.log(response.responseJSON.errors.tipo[0]);
                    }
                },
            });
        });

    </script>

@stop