<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::select('grado','letra')
            ->get();
        return response()->json($grupos,200);
    }

    public function store(Request $request)
    {
        $grupo = $request->all();
        Grupo::create($grupo);

        return response()->json(['Ok'],200);

    }
}
