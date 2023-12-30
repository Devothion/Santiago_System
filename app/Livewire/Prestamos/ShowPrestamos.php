<?php

namespace App\Livewire\Prestamos;

use App\Models\Prestamo;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowPrestamos extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $prestamos = Prestamo::where(function ($query) {
                                    $query->where('nombre_cliente', 'like', '%'. $this->search . '%')
                                        ->orWhereHas('cliente', function ($query) {
                                            $query->where('documento', 'like', '%'. $this->search . '%');
                                        });
                                })
                                ->with('solicitud')
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

    #[On('desembolsarPrestamo')]
    public function desembolsarPrestamo($prestamoId)
    {
        $prestamo = Prestamo::find($prestamoId);

        if ($prestamo) {
            $prestamo->estado = 'Vigente';
            $prestamo->save();
            $this->dispatch('prestamoDesembolsado', ['icon' => 'success', 'title' => 'Tarea Realizada', 'text' => 'Prestamo desembolsado exitosamente']);
        } else {
            $this->dispatch('prestamoDesembolsado', ['icon' => 'error', 'title' => 'Tarea Fallida', 'text' => 'No se pudo desembolsar el prestamo']);
        }
    }
}
