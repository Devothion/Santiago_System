<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'fecha_operacion',
        'estado',
        'capital',
        'saldo_prestamo',
        'observaciones',
        'compromiso_pago',
        'hora',
        'fecha_compromiso',
        'monto_compromiso'
    ];
}
