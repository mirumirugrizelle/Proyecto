<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{

    public function index()
    {
        $lista = Profesor ::select('idProfesor', 'cedula', 'grado_academico')
            ->get();
        return response()->json($lista,200);
    }


    public function store(Request $request)
    {
        Profesor::create($request->all());
        return response()->json(['Ok'],200);
    }


    public function show($id)
    {
        $profesor = Profesor::where('idProfesor',$id)
            ->first();
        return response()->json($profesor,200);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'cedula' => 'required',
            'grado_academico' => 'required',

        ]);

        $update = ['cedula' => $request->cedula, 'grado_academico' => $request->grado_academico];
        Profesor::where('idProfesor',$id)->update($update);
        return response()->json(['Ok'],200);
    }


    public function destroy($id)
    {
        Profesor::where('idProfesor',$id)->delete();
        return response()->json(['Ok'],200);
    }
}
