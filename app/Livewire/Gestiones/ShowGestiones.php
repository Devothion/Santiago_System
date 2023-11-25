<?php

namespace App\Livewire\Gestiones;

use App\Models\Gestion;
use Livewire\Component;

class ShowGestiones extends Component
{

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $gestiones = Gestion::where('compromiso_pago', 0)
                            ->where(function ($query) {
                                $query->where('cliente', 'like', '%'. $this->search .'%')
                                    ->orWhere('estado', 'like', '%'. $this->search .'%');
                            })
                            ->orderBy($this->sort, $this->direction)            
                            ->paginate(10);

        return view('livewire.gestiones.show-gestiones', compact('gestiones'));
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
