<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Persona ::select('CURP', 'nombre', 'apellido_paterno','apellido_materno','sexo','fecha_nacimiento','direccion','telefono_tutor','email')
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
        Persona::create($request->all());
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
        $persona = Persona::where('CURP',$id)
            ->first();
        return response()->json($persona,200);
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
        $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono_tutor' => 'required',
            'email' => 'required',

        ]);

        $update = ['nombre' => $request->nombre, 'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno, 'sexo' => $request->sexo,
            'fecha_nacimiento' => $request->fecha_nacimiento, 'telefono_tutor' => $request->telefono_tutor,
            'email' => $request->email];
        Persona::where('CURP',$id)->update($update);
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
        Persona::where('CURP',$id)->delete();
        return response()->json(['Ok'],200);
    }
}
