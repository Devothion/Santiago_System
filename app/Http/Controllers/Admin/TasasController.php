<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tasa;
use Illuminate\Http\Request;

class TasasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Tasas.index');
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
        $tasa = Tasa::find($id);

        return view('admin.Tasas.edit', compact('tasa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasa $tasa)
    {
        $tasa->update([
            'tipo_tasa' => $request->tipoTasa,
            'valor' => $request->valorTasa,

        ]);

        return redirect()->route('admin.tasas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
