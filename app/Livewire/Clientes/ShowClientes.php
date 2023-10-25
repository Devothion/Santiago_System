<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class ShowClientes extends Component
{

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $clientes = Cliente::where('documento', 'like', '%'. $this->search .'%')
                          ->orWhere('nombres', 'like', '%'. $this->search .'%')
                          ->orderBy($this->sort, $this->direction)                      
                          ->paginate(10);

        return view('livewire.clientes.show-clientes', compact('clientes'));
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
