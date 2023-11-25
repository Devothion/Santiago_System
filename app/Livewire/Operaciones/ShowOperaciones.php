<?php

namespace App\Livewire\Operaciones;

use App\Models\Pago;
use Livewire\Component;

class ShowOperaciones extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $operaciones = Pago::where('fecha_creacion', 'like', '%'. $this->search .'%')
                                ->orWhere('cliente', 'like', '%'. $this->search .'%')
                                ->orderBy($this->sort, $this->direction)                      
                                ->paginate(10);

        return view('livewire.operaciones.show-operaciones', compact('operaciones'));
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
