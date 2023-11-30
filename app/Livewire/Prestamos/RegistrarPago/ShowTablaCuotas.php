<?php

namespace App\Livewire\Prestamos\RegistrarPago;

use App\Models\Cuota;
use Livewire\Component;

class ShowTablaCuotas extends Component
{
    public $cuota;
    public $solicitud_id;
    public $rows = [];
    public $subtotal = 0;
    public $isFirstRow;
    public $isLastRow;
    public $baseRowId;

    public function mount(Cuota $cuota)
    {
        $this->cuota = $cuota;
        $this->baseRowId = $cuota->id;

        // Añadir la primera fila al array de filas
        $this->rows[] = [
            'column1' => $cuota->id,
            // 'column2' => '----',
            'column3' => $cuota->fecha,
            'column4' => $cuota->cuota,
        ];

        // Verificar si la fila actual es la primera
        $this->isFirstRow = $cuota->id === Cuota::where('solicitud_id', $this->solicitud_id)->where('statusPago', '!=', 0)->oldest()->first()->id;
        // Verificar si la fila actual es la última
        $this->isLastRow = $cuota->id === Cuota::where('solicitud_id', $this->solicitud_id)->latest()->first()->id;
        //Actualizar el valor de 'subtotal'
        $this->subtotal = array_sum(array_column($this->rows, 'column4'));
    }

    public function render()
    {
        return view('livewire.prestamos.registrar-pago.show-tabla-cuotas', ['rows' => $this->rows, 'subtotal' => $this->subtotal]);
    }

    public function agregarCuota()
    {
        $nextCuotaId = $this->cuota->id + 1;

        $nextCuota = Cuota::where('solicitud_id', $this->solicitud_id)->find($nextCuotaId);

        if ($nextCuota) {

            $this->cuota = $nextCuota;

            // En lugar de añadir una nueva fila, actualizar el id de la cuota en el array de filas
            $this->rows[] = [
                'cuota_id' => $nextCuota->id,
                'column1' => $nextCuota->id,
                //'column2' => '----',
                'column3' => $nextCuota->fecha,
                'column4' => $nextCuota->cuota,
            ];
            
            // Verificar si la fila actual es la última
            $this->isLastRow = $nextCuota->id === end($this->rows)['column1'];
            //Actulizar el valor de 'subtotal'
            $this->subtotal = array_sum(array_column($this->rows, 'column4'));
            // Emitir el evento
            $this->dispatch('actualizarSubtotal', $this->subtotal);

        } else {
            
        }
    }

    public function eliminarCuota($id)
    {
        $cuota = Cuota::where('solicitud_id', $this->solicitud_id)->find($id);

        if ($cuota) {

            // Eliminar la cuota de la tabla en el array de filas
            $this->rows = array_filter($this->rows, function ($row) use ($id) {
                return $row['column1'] !== $id;
            });

            // Actualizar el valor de 'subtotal'
            $this->subtotal = array_sum(array_column($this->rows, 'column4'));
            // Emitir el evento
            $this->dispatch('actualizarSubtotal', $this->subtotal);
            
        } else {

        }

    }

}
