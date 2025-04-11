<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = DB::table('empleados')
        ->join('departamentos', 'empleados.departamento_id', '=', 'departamentos.id')
        ->select('empleados.*', 'departamentos.nombre')
        ->get();

      return view('empleado.index', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = DB::table('departamentos')
        ->orderBy('nombre')
        ->get();

        return view('empleado.new', ['departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();

        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->posición = $request->posición;
        $empleado->departamento_id = $request->departamento_id;
        $empleado->fecha_contratación = $request->fecha_contratación;
        $empleado->salario = $request->salario;
        $empleado->save();
    
        $empleados = DB::table('empleados')
            ->join('departamentos', 'empleados.departamento_id', '=', 'departamentos.id')
            ->select('empleados.*', 'departamentos.nombre')
            ->get();
    
        return view('empleado.index', ['empleados' => $empleados]);
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
