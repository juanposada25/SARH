<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $departamentos = DB::table('departamentos')->get();
        return view('departamento.index', ['departamentos' => $departamentos]);

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamento.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $departamento = new Departamento();
        $departamento->nombre = $request->nombre;
        $departamento->ubicacion = $request->ubicacion;
        $departamento->numero_telefono = $request->numero_telefono;
        $departamento->save();

        return redirect()->route('departamentos.index');
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
