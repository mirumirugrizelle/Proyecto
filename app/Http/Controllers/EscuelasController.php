<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use Illuminate\Http\Request;

class EscuelasController extends Controller
{

    public function index()
    {
        $lista = Escuela ::select('CCT', 'nombre')
            ->get();
        return response()->json($lista,200);
    }


    public function store(Request $request)
    {
        Escuela::create($request->all());
        return response()->json(['Ok'],200);
    }


    public function show($id)
    {
        $escuela = Escuela::where('CCT',$id)
            ->first();
        return response()->json($escuela,200);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',

        ]);

        $update = ['nombre' => $request->nombre];
        Escuela::where('CCT',$id)->update($update);
        return response()->json(['Ok'],200);
    }


    public function destroy($id)
    {
        Escuela::where('CCT',$id)->delete();
        return response()->json(['Ok'],200);
    }
}
