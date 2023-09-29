<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
    
    public function zona()
    {
        return $this->hasMany(Zona::class);
    }

    public function sucursal()
    {
        return $this->hasMany(Sucursal::class);
    }

}
