<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analista;
use App\Models\Asesor;
use App\Models\EntidadBancaria;
use App\Models\JCC;
use Illuminate\Http\Request;

class SimuladorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $entBancarias = EntidadBancaria::all();
        $analistas = Analista::all();
        $jccs = JCC::all();
        $asesores = Asesor::all();

        return view('admin.simulador.index', compact('entBancarias', 'analistas', 'jccs', 'asesores'));
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
