<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function distritos(Provincia $provincia)
    {
        $distrito = $provincia->distrito;
        return response()->json($distrito);
    }
}
