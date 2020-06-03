<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradoresController extends Controller
{

    public function index()
    {
        $admin = DB::table('administradores')->select('personas.*','')
            ->join('personas','administradores.idAdministrador','=','personas.CURP')
            ->get();
        return response()->json($admin,200);
    }

    public function store(Request $request)
    {
        DB::table('administradores')->insert([
            'idAdministrador' =>$request->input('idAdministrador'),
            'contrasena' =>bcrypt($request->input('contrasena'))
        ]);

        return response()->json(['ok'],200);

    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


}
