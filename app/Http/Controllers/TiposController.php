<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TiposController extends Controller
{

    public function index()
    {
        $lista = Tipo ::select('idTipo', 'nombre')
            ->get();
        return response()->json($lista,200);
    }


    public function store(Request $request)
    {
        Tipo::create($request->all());
        return response()->json(['Ok'],200);
    }


    public function show($id)
    {
        $tipo = Tipo::where('idTipo',$id)
            ->first();
        return response()->json($tipo,200);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',


        ]);

        $update = ['nombre' => $request->nombre];
        Banner::where('idTipo',$id)->update($update);
        return response()->json(['Ok'],200);
    }


    public function destroy($id)
    {
        Tipo::where('idTipo',$id)->delete();
        return response()->json(['Ok'],200);
    }
}
