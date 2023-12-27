<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FondoProvicionalController extends Controller
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
        $cuentas = Cuenta::all();

        return view('admin.Solicitudes.FondoProvicional.create', compact('solicitud', 'cuentas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $solicitud_id = $request->input('solicitud_id');
        $solicitud = Solicitud::find($solicitud_id);
        $solicitud->fondo_provi = 1;
        
        $pdf = Pdf::loadView('admin.PDF.pdf', ['id' => $solicitud_id]);
        $pdf->setPaper('A4', 'portrait');
        
        $fecha_actual = Carbon::now()->format('dmY');
        $nombre_archivo = 'Fondo_Provicional_'.$solicitud_id.'_'.$fecha_actual.'.pdf';
        $solicitud->pdf = $nombre_archivo;
        Storage::put('public/PDF/fondo_provicional/'.$nombre_archivo, $pdf->output());
        
        $solicitud->save();

        return redirect()->route('admin.solicitudes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pdf = Solicitud::where('id', $id)->pluck('pdf')->first();

        $pathToFile = storage_path('app/public/PDF/fondo_provicional/'.$pdf);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->file($pathToFile, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
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
