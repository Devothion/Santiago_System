<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagen',
        'sucursal',
        'jcc',
        'asesor',
        'documento',
        'nombres',
        'ape_pat',
        'ape_mat',
        'telefono',
        'departamento',
        'provincia',
        'distrito',
        'zona',
        'nlote',
        'direccion',
        'referencia',
        'tipoCuenta',
        'entidad',
        'cuentafi',
        'entidadter',
        'cuentater',
        'titularter',
        'aval',
        'documentoav',
        'nombresav',
        'ape_patav',
        'ape_matav',
        'direccionav',
        'celularav',
        'observ'
    ];

    public function solicitud()
    {
        return $this->hasMany(Solicitud::class);
    }

}
