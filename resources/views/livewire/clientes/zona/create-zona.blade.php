<div>
    <div id="agregarZona-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.zonas.store') }}" method="POST">
                    @csrf
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
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tipoZona">Tipo de zona</label>
                                    <input type="text" class="form-control" name="tipoZona" id="tipoZona">
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
</div>
