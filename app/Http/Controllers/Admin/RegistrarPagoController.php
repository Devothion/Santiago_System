<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use App\Models\Cuota;
use App\Models\Pago;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Http\Request;
class RegistrarPagoController extends Controller
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
        $cuota_id = $request->query('cuota_id');
        $cuota_normal = Cuota::where('id', $cuota_id)->value('cuota');

        $capital_total = Solicitud::where('id', $solicitud_id)->value('mon_sol');
        $cuotas_pagadas = Cuota::where('solicitud_id', $solicitud_id)->where('statusPago', 1)->sum('cuota');
        $saldo_prestamo = $capital_total - $cuotas_pagadas;


        return view('admin.Prestamos.RegistrarPago.create', compact('solicitud', 'saldo_prestamo', 'cuota_normal', 'cuota_id'));
    }

    public function create2(Request $request)
    {
        $solicitud_id = $request->query('solicitud_id');
        $solicitud = Solicitud::find($solicitud_id);
        $cuentas = Cuenta::whereIn('entidad_bancaria_id', [1, 2, 3, 4])->with('entidadBancaria')->get();
        $cuentas_yape = Cuenta::where('entidad_bancaria_id', 5)->with('entidadBancaria')->get();
        $cuentas_plin = Cuenta::where('entidad_bancaria_id', 6)->with('entidadBancaria')->get();

        $hoy = Carbon::now();
        $saldo_deuda_hasta = Cuota::where('fecha', '<', $hoy)->where('solicitud_id', $solicitud_id)->where('statusPago', 0)->sum('cuota');
        $cuota = Cuota::where('solicitud_id', $solicitud_id)->where('statusPago', '0')->first();

        return view('admin.Prestamos.RegistrarPago.create_2', compact('solicitud', 'cuota', 'cuentas', 'saldo_deuda_hasta', 'cuentas_yape', 'cuentas_plin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        Pago::create([
            'cliente' => $request->cliente,
            'fecha_creacion' => $request->fechaOperacion,
            'capital' => $request->capital,
            'saldo_prestamo' => $request->saldoPrestamo,
            'saldo_deuda_hasta' => $request->saldoDeuda,
            'saldo_mora' => $request->saldoMora,
            'cuota_normal' => $request->cuotaNormal,
            'total_pagar' => $request->totalPagar,
            'metodo_pago_id' => $request->metodoPago,
            'abono' => $request->abono,
            'moras' => $request->mora,
            'gas' => $request->gas
        ]);

        if ($request->abono >= $request->cuotaNormal) {
            $cuota = Cuota::where('id', $request->cuotaId)->first();
            $cuota->statusPago = 1;
            $cuota->save();
        } elseif (0 < $request->abono || $request->abono < $request->cuotaNormal) {
            $cuota = Cuota::where('id', $request->cuotaId)->first();
            $cuota->statusPago = 2;
            $cuota->save();
        } else {
            echo "Todos los procedimientos han fallado";
        }

        return redirect()->route('admin.prestamos.show', ['prestamo' => $request->solicitudId ]);

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
    public function edit(Request $request, string $id)
    {
        $solicitud = Solicitud::find($id);
        // $saldo_prestamo = 

        return view('admin.Prestamos.RegistrarPago.create', compact('solicitud'));
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
