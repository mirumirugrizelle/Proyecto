<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Calificacion;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lista = Publicacion ::select('titulo', 'imagen')
            ->joinPublicacionTipo()
            ->where('tipos.nombre','calificaciones')
            ->get();
        return response()->json($lista,200);
    }

    public function show($grupo)
    {
        $calificacion = Publicacion ::select('imagen')
            ->where('imagen', 'like', '%'.$grupo.'%')
            ->first();

        return response()->json($calificacion,200);
    }

}
