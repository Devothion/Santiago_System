<?php

namespace App\Livewire\Prestamos;

use Livewire\Component;
use App\Models\Solicitud;

class ShowPrestamos extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $prestamos = Solicitud::where('estado', 'Aprobado')
                                ->where(function ($query) {
                                    $query->where('nombre_cliente', 'like', '%'. $this->search . '%')
                                        ->orWhereHas('cliente', function ($query) {
                                            $query->where('documento', 'like', '%'. $this->search . '%');
                                        });
                                })
                                ->with('cliente')
                                ->orderBy($this->sort, $this->direction)            
                                ->paginate(10);
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
