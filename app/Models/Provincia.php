<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function distrito()
    {
        return $this->hasMany(Distrito::class);
    }

    public function sucursal()
    {
        return $this->hasMany(Sucursal::class);
    }

}
