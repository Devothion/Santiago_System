<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function provincias(Departamento $departamento)
    {
        $provincia = $departamento->provincia;
        return response()->json($provincia);
    }
}
