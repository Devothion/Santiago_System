<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'entidad_bancaria_id',
        'numero_cuenta',
        'codigo'
    ];

    public function entidadBancaria()
    {        
        return $this->belongsTo(EntidadBancaria::class);
    }

}
