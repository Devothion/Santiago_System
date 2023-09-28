<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Prestamo;
use App\Models\Asesor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.prestamos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $asesores = Asesor::all();

        return view('admin.prestamos.create', compact('clientes', 'asesores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $cliente = Cliente::find($request->cliente);
        $nombre = $cliente->nombres.' '.$cliente->ape_pat.' '.$cliente->ape_mat;

        Prestamo::create([
            'id_cli' => $request->cliente,
            'estado' => $request->estado,
            'cliente' => $nombre,
            'tip_sol' => $request->tSolicitud,
            'cta_asig' => $request->cuentaAsignada,
            'fech_ate' => $request->fechaAtencion,
            'plazo' => $request->plazo,
            'mon_sol' => $request->montoSolicitado,
            'tas_int' => $request->tasaInteres,
            'cap_int' => $request->capitaInteres,
            'tas_mor' => $request->tasaMora,
            'fre_pag' => $request->frecuenciaPago,
            'fpri_pag' => $request->fechaPrimerPago,
            'ana_cre' => $request->asesorCredito,
            'observ' => $request->observaciones
        ]);

        return redirect()->route('admin.prestamos.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.prestamos.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.prestamos.edit');
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
