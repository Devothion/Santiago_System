<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $roles = Role::all();

        return view('admin.Usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->contrasena),
            'name' => $request->nombres,
            'documento' => $request->nDocumento,
            'ape_pat' => $request->aPaterno,
            'ape_mat' => $request->aMaterno,
            'telefono' => $request->telefono,
            'codigo' => $request->codigo
        ]);

        $roles = $request->role;
        $user->roles()->sync($roles);

        return redirect()->route('admin.usuarios.index');
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
        $roles = Role::all();

        $usuario = User::find($id);

        return view('admin.Usuarios.edit', compact('roles', 'usuario'));
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
