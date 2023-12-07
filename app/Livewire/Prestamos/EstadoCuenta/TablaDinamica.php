<?php

namespace App\Livewire\Prestamos\EstadoCuenta;

use App\Models\Solicitud;
use Livewire\Component;

class TablaDinamica extends Component
{

    public $tabla = '1';
    public $activeButton = '1';

    public function mostrarTabla($tabla)
    {
        $this->tabla = $tabla;
        $this->activeButton = $tabla;
    }

    public $cuotas;

    public function cuotas($cuotas)
    {
        $this->cuotas = $cuotas;
    }

    public $id;
    
    public function solicitud($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        // dd($this->id);
        $solicitud = Solicitud::find($this->id);

        return view('livewire.prestamos.estado-cuenta.tabla-dinamica', compact('solicitud'));
    }

}
