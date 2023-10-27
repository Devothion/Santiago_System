<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Asesor;
use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Solicitudes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $asesores = Asesor::all();
        $cuentas = Cuenta::all();

        return view('admin.Solicitudes.create', compact('clientes', 'asesores', 'cuentas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $calculo = realizar_calculo($request->montoSolicitado, $request->plazo);

        //dd($calculo);
        //dd($request->all());
        $cliente = Cliente::find($request->cliente);
        $nombre = $cliente->nombres.' '.$cliente->ape_pat.' '.$cliente->ape_mat;
        $tipo = $request->frecuenciaPago;
        $tasa_interes = $request->tasaInteres;
        $fecha_pago = $request->fechaPrimerPago;
        $capitalInteres = $request->capitaInteres;

        $solicitud = Solicitud::create([
            'cliente_id' => $request->cliente,
            'estado' => $request->estado,
            'nombre_cliente' => $nombre,
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

        $id = $solicitud->id;
        $year = Carbon::now()->year;
        
        //return redirect()->route('admin.solicitudes.index');
        return view('admin.Solicitudes.calculo', compact('calculo', 'nombre', 'tipo', 'tasa_interes', 'fecha_pago', 'id', 'year', 'capitalInteres'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        //return view('admin.PDF.calculo', compact('id'));
        $pdf = Pdf::loadView('admin.PDF.pdf', ['id' => $id]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $clientes = Cliente::all();
        $asesores = Asesor::all();
        $solicitud = Solicitud::find($id);
        $cuentas = Cuenta::all();

        return view('admin.Solicitudes.edit', compact('solicitud', 'clientes', 'asesores', 'cuentas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitude)
    {

        //dd($request->all());

        $cliente = Cliente::find($request->cliente);
        $nombre = $cliente->nombres.' '.$cliente->ape_pat.' '.$cliente->ape_mat;

        $solicitude->update([
            'cliente_id' => $request->cliente,
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

        return redirect()->route('admin.solicitudes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encuentra el registro por su ID
        $registro = Solicitud::find($id);

        // Verifica si el registro existe
        if ($registro) {
            // Elimina el registro
            $registro->delete();

            // Redirige a la página anterior con un mensaje de éxito
            return redirect()->back()->with('success', 'Registro eliminado con éxito.');
        } else {
            // Redirige a la página anterior con un mensaje de error
            return redirect()->back()->with('error', 'Registro no encontrado.');
        }
    }
}
