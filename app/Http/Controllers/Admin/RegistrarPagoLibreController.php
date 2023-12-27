<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asesor;
use App\Models\Cliente;
use App\Models\JCC;
use App\Models\Solicitud;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class RegistrarPagoLibreController extends Controller
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
    public function create(Request $request)
    {
        $solicitud_id = $request->query('solicitud_id');
        $solicitud = Solicitud::find($solicitud_id);
        $sucursales = Sucursal::all();
        $jccs = JCC::all();
        $asesores = Asesor::all();

        $cliente = Cliente::find($solicitud->cliente_id);

        return view('admin.Prestamos.RegistrarPagoLibre.create', compact('solicitud', 'sucursales', 'jccs', 'asesores', 'cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
