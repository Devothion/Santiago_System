<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ZonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        if (!empty($request->nuevoTipoZona)) {
            $tipo = $request->nuevoTipoZona;
        } else {
            $tipo = $request->tipoZona;
        }

        $validarDatos = $request->validate([
            'nombreZona' => [
                'required',
                Rule::unique('zonas', 'zona')->where(function ($query) use ($request) {
                    return $query->where('distrito_id', $request->distritoZona_id);
                }),
            ],
            'nuevoTipoZona' => 'unique:zonas,tipo'
        ]);

        Zona::create([
            'zona' => $request->nombreZona,
            'status' => '1',
            'distrito_id' => $request->distritoZona_id,
            'tipo' => $tipo
        ]);

        return response()->json([
            'zona' => $request->nombreZona,
            'tipo' => $tipo]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
