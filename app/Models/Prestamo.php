<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'solicitud_id',
        'cliente_id',
        'analista_id',
        'nombre_cliente',
        'estado'
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function analista()
    {
        return $this->belongsTo(Analista::class);
    }

}
