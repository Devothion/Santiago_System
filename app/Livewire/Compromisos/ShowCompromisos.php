<?php

namespace App\Livewire\Compromisos;

use App\Models\Gestion;
use Livewire\Component;

class ShowCompromisos extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $compromisos = Gestion::with('cliente')
                                ->where('compromiso_pago', 1)
                                ->where(function ($query) {
                                    $query->where('nombre_cliente', 'like', '%'. $this->search .'%')
                                        ->orWhere('estado', 'like', '%'. $this->search .'%');
                                })
                                ->orderBy($this->sort, $this->direction)            
                                ->paginate(10);

        return view('livewire.compromisos.show-compromisos', compact('compromisos'));
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
