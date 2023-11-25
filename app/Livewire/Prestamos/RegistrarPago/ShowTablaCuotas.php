<?php

namespace App\Livewire\Prestamos\RegistrarPago;

use App\Models\Cuota;
use Livewire\Component;

class ShowTablaCuotas extends Component
{
    public $cuota;
    public $cuota_d;
    public $rows = [];

    public function mount(Cuota $cuota)
    {
        $this->cuota = $cuota;
    }

    public function render()
    {
        return view('livewire.prestamos.registrar-pago.show-tabla-cuotas', ['cuota' => $this->cuota ]);
    }

    public function agregarCuota()
    {
        $nextCuotaId = $this->cuota->id + 1;
        $nextCuota = Cuota::find($nextCuotaId);

        if ($nextCuota) {
            $this->cuota_d = $nextCuota;
            $this->rows[] = ['column1' => $this->cuota_d->id, 'column2' => '----', 'column3' => $this->cuota_d->fecha, 'column4' => $this->cuota_d->cuota];
        } else {
            // Aquí puedes manejar el caso cuando no hay un siguiente registro
            // Por ejemplo, puedes emitir un evento o mostrar un mensaje al usuario
        }
    }
}
