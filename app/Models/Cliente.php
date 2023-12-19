<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagen',
        'sucursal_id',
        'jcc_id',
        'asesor_id',
        'documento',
        'nombres',
        'ape_pat',
        'ape_mat',
        'telefono',
        'departamento_id',
        'provincia_id',
        'distrito_id',
        'zona',
        'nlote',
        'direccion',
        'referencia',
        'tipo_cuenta_id',
        'entidad_bancaria_id',
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

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function jcc()
    {
        return $this->belongsTo(JCC::class);
    }

    public function asesor()
    {
        return $this->belongsTo(Asesor::class);
    }

    public function gestion()
    {
        return $this->habesMany(Gestion::class);
    }

}
