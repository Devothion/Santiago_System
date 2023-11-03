<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'estado',
        'nombre_cliente',
        'tip_sol',
        'cta_asig',
        'fech_ate',
        'plazo',
        'mon_sol',
        'tas_int',
        'cap_int',
        'tas_mor',
        'fre_pag',
        'fpri_pag',
        'analista_id',
        'observ'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function analista()
    {
        return $this->belongsTo(Analista::class);
    }

}
