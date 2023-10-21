<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidacionesController extends Controller
{
    public function validarDNI(Request $request)
    {
        $request->validate([
            'documento' => 'required|digits:8|unique:Clientes',
        ]);

        return response()->json(['mensaje' => 'DNI válido']);
    }
}
