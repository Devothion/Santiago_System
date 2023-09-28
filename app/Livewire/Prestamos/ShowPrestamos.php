<?php

namespace App\Livewire\Prestamos;

use Livewire\Component;
use App\Models\Prestamo;

class ShowPrestamos extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $prestamos = Prestamo::where('id', 'like', '%'. $this->search . '%')
                           ->orWhere('cliente', 'like', '%'. $this->search . '%')
                           ->orderBy($this->sort, $this->direction)
                           ->get();
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
