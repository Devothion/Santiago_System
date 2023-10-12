<?php

namespace App\Livewire\Solicitudes;

use App\Models\Solicitud;
use Livewire\Component;

class ShowSolicitudes extends Component
{

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $cant_aprobado = Solicitud::where('estado', 'Aprobado')->count();
        $cant_analisis = Solicitud::where('estado', 'En Analisis')->count();
        $cant_espera = Solicitud::where('estado', 'En Espera')->count();
        $cant_finalizado = Solicitud::where('estado', 'Finalizado')->count();

        $solicitudes = Solicitud::where('id', 'like', '%'. $this->search . '%')
                           ->orWhere('cliente', 'like', '%'. $this->search . '%')
                           ->orderBy($this->sort, $this->direction)
                           ->get();

        return view('livewire.solicitudes.show-solicitudes', compact('solicitudes', 'cant_aprobado', 'cant_analisis', 'cant_espera', 'cant_finalizado'));
    }
}
