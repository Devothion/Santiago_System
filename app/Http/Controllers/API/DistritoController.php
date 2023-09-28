<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Distrito;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    public function zonas(Distrito $distrito)
    {
        $zona = $distrito->zona;
        return response()->json($zona);
    }
}
