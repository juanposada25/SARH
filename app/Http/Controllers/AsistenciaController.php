<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asistencia;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $asistencias = DB::table('asistencias')
            ->join('empleados', 'asistencias.empleado_id', '=', 'empleados.id')
            ->select('asistencias.*', 'empleados.nombre')
            ->get();

        return view('asistencia.index', ['asistencias' => $asistencias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $empleados = DB::table('empleados')
            ->orderBy('nombre')
            ->get();

        return view('asistencia.new', ['empleados' => $empleados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asistencia = new Asistencia();

        $asistencia->empleado_id = $request->empleado_id;
        $asistencia->fecha = $request->fecha;
        $asistencia->hora_entrada = $request->hora_entrada;
        $asistencia->hora_salida = $request->hora_salida;
        $asistencia->save();
    
        $asistencias = DB::table('asistencias')
            ->join('empleados', 'asistencias.empleado_id', '=', 'empleados.id')
            ->select('asistencias.*', 'empleados.nombre')
            ->get();
    
        return view('asistencia.index', ['asistencias' => $asistencias]);
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
