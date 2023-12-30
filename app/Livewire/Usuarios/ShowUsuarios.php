<?php

namespace App\Livewire\Usuarios;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class ShowUsuarios extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $usuarios = User::where('documento', 'like', '%'. $this->search .'%')
                          ->orWhere('name', 'like', '%'. $this->search .'%')
                          ->orderBy($this->sort, $this->direction)                      
                          ->get();
        
        return view('livewire.usuarios.show-usuarios', compact('usuarios'));
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

    #[On('deleteUser')]
    public function deleteUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            $this->dispatch('userDeleted', ['icon' => 'success', 'title' => 'Tarea Realizada', 'text' => 'Usuario eliminado exitosamente.']);
        } else {
            $this->dispatch('userDeleted', ['icon' => 'error', 'title' => 'Tarea Fallida', 'text' => 'No se pudo eliminar el usuario.']);
        }
    }
}


