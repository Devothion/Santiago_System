<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cli',
        'estado',
        'cliente',
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
        'ana_cre',
        'observ'
    ];
}
