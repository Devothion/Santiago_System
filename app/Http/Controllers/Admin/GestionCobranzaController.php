<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuota;
use App\Models\Gestion;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class GestionCobranzaController extends Controller
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
        $cuotas_pagadas = Cuota::where('solicitud_id', $solicitud_id)->where('statusPago', 1)->sum('cuota');
        $saldo_prestamo = $solicitud->mon_sol - $cuotas_pagadas;

        return view('admin.Prestamos.GestionCobranzas.create', compact('solicitud', 'saldo_prestamo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        if (!isset($request->compromisoPago)) {
            $compromisoPago = 0;
        } else {
            $compromisoPago = $request->compromisoPago;
        }

        Gestion::create([
            'cliente_id' => $request->cliente_id,
            'nombre_cliente' => $request->cliente,
            'fecha_operacion' => $request->fechaOperacion,
            'estado' => $request->estado,
            'capital' => $request->capital,
            'saldo_prestamo' => $request->saldoPrestamo,
            'observaciones' => $request->observaciones,
            'compromiso_pago' => $compromisoPago,
            'hora' => $request->hora,
            'fecha_compromiso' => $request->fecha,
            'monto_compromiso' => $request->monto,
        ]);

        return redirect()->route('admin.prestamos.index');
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
