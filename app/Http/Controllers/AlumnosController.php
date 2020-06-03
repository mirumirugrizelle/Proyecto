<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */

    public function index()
    {
        $lista = Alumno::select('apellido_paterno','apellido_materno','nombre')
            ->joinAlumnoPersona()
            ->get();
        return response()->json($lista,200);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->curp = $request->input('curp');
        $persona->apellido_paterno = $request->input('apellido_paterno');
        $persona->apellido_materno = $request->input('apellido_materno');
        $persona->nombre = $request->input('nombre');
        $persona->sexo = $request->input('sexo');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        if($request->has("email"))
            $persona->email = $request->input('email');
        Persona::create($persona);
        $alumno = new Alumno();
        $alumno->idAlumno = $request->input('curp');
        if($request->has('promedio'))
            $alumno->promedio = $request->input('promedio');
        $alumno->grado = $request->input('grado');
        $alumno->clase = $request->input('clase');
        $alumno->fecha_ingreso = $request->input('fecha_ingreso');
        Alumno::create($alumno);

        return response()->json($alumno,200);
    }


    public function show($id)
    {
        $alumno = Alumno::findOrFail($id)
                    ->first();

        return response()->json($alumno,200);
    }


    public function update(Request $request, $id)
    {
        Alumno::findOrFail($id)->update($request->all());
        return response()->json(['Ok'],200);
    }

    public function destroy($id)
    {
        Alumno::findOrFail($id)->delete();

        return response()->json(['Ok'],200);
    }
}
