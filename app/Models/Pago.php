<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'fecha_creacion',
        'capital',
        'saldo_prestamo',
        'saldo_deuda_hasta',
        'saldo_mora',
        'cuota_normal',
        'total_pagar',
        'metodo_pago_id',
        'abono',
        'moras',
        'gas'
    ];

}
