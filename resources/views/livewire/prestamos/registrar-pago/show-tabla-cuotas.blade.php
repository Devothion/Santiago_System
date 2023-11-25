<div>
    <div class="card card-secondary">
        <div class="card-header">
            <div class="card-title">
                Pago de Cuotas
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-sm">
                <thead>
                    <tr>
                        <th>N° Operacion</th>
                        <th>Recepción</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Cuota</th>
                        <th>Pago</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td>
                            <input type="text" class="form-control" value="{{$cuota->id}}" readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control" value="----" readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($cuota->fecha)->format('d-m-Y') }}" readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control" value="{{"S/ ".$cuota->cuota}}" readonly>
                        </td>
                    </tr>
                    @foreach($rows as $index => $row)
                        <tr>
                            <td>
                                <input type="text" class="form-control" value="{{ $row['column1'] }}" readonly>
                            </td>
                            <td>
                                <input type="text" class="form-control" value="{{ $row['column2'] }}" readonly>
                            </td>
                            <td>
                                <input type="text" class="form-control" value="{{ $row['column3'] }}" readonly>
                            </td>
                            <td>
                                <input type="text" class="form-control" value="{{"S/ ".$row['column4']}}" readonly>
                            </td>
                            <td>
                                <button class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-primary font-weight-bold align-middle">Sub total: S/ 149.92</td>
                    </tr>
                    
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-1">
                    <input type="number" class="form-control" value="1">
                </div>
                <div class="col-2">
                    <button wire:click.prevent='agregarCuota' class="btn btn-success">Agregar Cuotas</button>
                </div>
            </div>
        </div>
    </div>
</div>
