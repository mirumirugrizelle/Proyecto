<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\GrupoMateriaAula;
use Illuminate\Http\Request;

class GruposMateriasAulasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = GrupoMateriaAula::select('grupos.grado', 'grupos.letra', 'materias.idMateria','profesores.idProfesor','aulas.idAula','hora')
            ->get();
        return response()->json($lista,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GrupoMateriaAula::create($request->all());
        return response()->json(['Ok'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupomateriaaula = GrupoMateriaAula::findOrFail($id)
            ->first();

        return response()->json($grupomateriaaula,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        GrupoMateriaAula::findOrFail($id)->update($request->all());
        return response()->json(['Ok'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GrupoMateriaAula::findOrFail($id)->delete();

        return response()->json(['Ok'],200);
    }
}
