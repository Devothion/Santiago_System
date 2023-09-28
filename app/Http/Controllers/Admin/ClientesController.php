<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sucursal;
use App\Models\JCC;
use App\Models\Asesor;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use App\Models\Zona;
use App\Models\EntidadBancaria;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $sucursales = Sucursal::all();
        $jccs = JCC::all();
        $asesores = Asesor::all();
        $departamentos = Departamento::all();
        $entBancarias = EntidadBancaria::all();
        $tipoCuentas = TipoCuenta::all();

        return view('admin.clientes.create', compact('sucursales', 'jccs', 'asesores', 'departamentos', 'entBancarias', 'tipoCuentas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        // Valida que el archivo haya sido cargado
        if ($request->hasFile('file')) {
            // Almacena la imagen en el disco 'public' y obtén su nombre
            $nombreImagen = $request->file('file')->store('img/cientes_img', 'public');
        } else {
            $nombreImagen = $request->file;
        }

        // Resto del código del método store...
        Cliente::create([
            'imagen' => $nombreImagen,
            'sucursal' => $request->sucursal,  
            'jcc' => $request->jcc,  
            'asesor' => $request->asesorCredito, 
            'documento' => $request->nDocumento,  
            'nombres' => $request->nombres,  
            'ape_pat' => $request->aPaterno,  
            'ape_mat' => $request->aMaterno,  
            'telefono' => $request->telefono,  
            'departamento' => $request->departamento,  
            'provincia' => $request->provincia,  
            'distrito' => $request->distrito,  
            'zona' => $request->zona,   
            'nlote' => $request->nLotes,  
            'direccion' => $request->direcDomicilio,  
            'referencia' => $request->referDomiciliaria,  
            'tipoCuenta' => $request->tCuenta,  
            'entidad' => $request->entidadFinanciera,  
            'cuentafi' => $request->f_nCuenta,  
            'entidadter' => $request->ct_eFinanciera,  
            'cuentater' => $request->ct_nCuenta,  
            'titularter' => $request->ct_Titular,
            'aval' => $request->aval,  
            'documentoav' => $request->av_nDocumento,  
            'nombresav' => $request->av_nombres,  
            'ape_patav' => $request->av_aPaterno,  
            'ape_matav' => $request->av_aMaterno,  
            'direccionav' => $request->av_direcDomicilio,  
            'celularav' => $request->av_telefono, 
            'observ' => $request->av_observaciones  
        ]);

        return redirect()->route('admin.clientes.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.clientes.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $sucursales = Sucursal::all();
        $jccs = JCC::all();
        $asesores = Asesor::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $distritos = Distrito::all();
        $zonas = Zona::all();
        $entBancarias = EntidadBancaria::all();
        $tipoCuentas = TipoCuenta::all();

        $cliente = Cliente::find($id);
        return view('admin.clientes.edit', compact('cliente', 'sucursales', 'jccs', 'asesores', 'departamentos', 'provincias', 'distritos', 'zonas', 'entBancarias', 'tipoCuentas'));
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
