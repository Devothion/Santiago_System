<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;

    protected $fillable = [
        'solicitud_id',
        'prestamo_id',
        'fecha',
        'numero',
        'cuota',
        'pagoCapital',
        'interes',
        'comision',
        'igv',
        'saldoCapital',
        'statusPago'
    ];

}
