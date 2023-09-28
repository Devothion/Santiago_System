<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'ape_pat',
        'ape_mat',
        'dni',
        'celular',
        'email',
        'codigo'
    ];

}
