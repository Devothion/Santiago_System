<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    public function provincia()
    {
        return $this->hasMany(Provincia::class);
    }

    public function sucursal()
    {
        return $this->hasMany(Sucursal::class);
    }

}
