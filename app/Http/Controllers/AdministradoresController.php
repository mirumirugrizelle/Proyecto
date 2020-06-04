<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    public function generate_string($strength) {
        $input = '0123456789.,;abcdefghijklmnopqrstuvwxyz!?¡¿+|^¬@><{][}ABCDEFGHIJKLMNOPQRSTUVWXYZ!?¡¿+|^¬';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }


    public function login(Request $request)
    {
        $login = Administrador::select('contrasena')->where('idAdministrador',$request['idAdministrador'])->get();
        Log::info($login);
        if(!$login->isEmpty()){
            if(Hash::check($request['contrasena'],$login[0]['contrasena'])) {
                try {
                    $bytes = random_bytes(100);
                } catch (\Exception $e) {
                }
                $token = bin2hex($bytes);
                Administrador::where('idAdministrador',$request['idAdministrador'])->update(["token" => $token]);
                $respondWithToken = array(
                    "idAdministrador" => $request['idAdministrador'],
                    "token" => $token,
                );

                return response()->json($respondWithToken, 200);
            }
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
