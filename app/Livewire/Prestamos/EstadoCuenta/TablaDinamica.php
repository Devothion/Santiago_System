<?php

namespace App\Livewire\Prestamos\EstadoCuenta;

use Livewire\Component;

class TablaDinamica extends Component
{

    public $tabla = '1';
    public $activeButton = '1';

    public function render()
    {
        return view('livewire.prestamos.estado-cuenta.tabla-dinamica');
    }

    public function mostrarTabla($tabla)
    {
        $this->tabla = $tabla;
        $this->activeButton = $tabla;
    }
}
