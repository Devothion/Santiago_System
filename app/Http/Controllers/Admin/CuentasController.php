<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use App\Models\EntidadBancaria;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return view('admin.Cuentas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entBancarias = EntidadBancaria::all();

        return view('admin.Cuentas.create', compact('entBancarias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());

        Cuenta::create([
            'entidad_bancaria_id' => $request->entidadFinanciera,
            'numero_cuenta' => $request->nCuenta,
            'codigo' => $request->codigo,
        ]);

        return redirect()->route('admin.cuentas.index');
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
        $entBancarias = EntidadBancaria::all();

        $cuenta = Cuenta::find($id);
        return view('admin.Cuentas.edit', compact('cuenta', 'entBancarias'));
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
