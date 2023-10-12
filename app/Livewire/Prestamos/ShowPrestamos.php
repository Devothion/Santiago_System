<?php

namespace App\Livewire\Prestamos;

use Livewire\Component;
use App\Models\Prestamo;
use App\Models\Solicitud;

class ShowPrestamos extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $prestamos = Solicitud::where('estado', 'Aprobado')->get();
        return view('livewire.prestamos.show-prestamos', compact('prestamos'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }
    }
}
