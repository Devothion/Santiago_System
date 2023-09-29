<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Sucursales.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $distritos = Distrito::all();

        return view('admin.Sucursales.create', compact('departamentos', 'provincias', 'distritos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        Sucursal::create([
            'sucursal' => $request->nombreSucursal,
            'departamento_id' => $request->departamento,
            'provincia_id' => $request->provincia,
            'distrito_id' => $request->distrito
        ]);

        return redirect()->route('admin.sucursales.index');
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
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $distritos = Distrito::all();

        $sucursal = Sucursal::with(['departamento', 'provincia', 'distrito'])->find($id);

        //dd($sucursal);

        return view('admin.Sucursales.edit', compact('sucursal', 'departamentos', 'provincias', 'distritos'));
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
