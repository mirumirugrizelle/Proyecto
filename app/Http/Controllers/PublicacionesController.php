<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use App\Models\Publicacion;
use App\Models\Tipo;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Publicacion ::select('idPublicacion', 'titulo', 'texto', 'imagen','tipos.idTipo')
            ->joinPublicacionTipo()
            ->get();
        return response()->json($lista,200);
    }

    public function store(Request $request)
    {
        $tipo = Tipo::select('idTipo')->where('nombre',$request['tipo']);
        $imagen = $request->file('imagen');
        if($request['tipo'] == 'Noticias')
        {
            $noticias = Publicacion::where('idTipo',$tipo)->count()+1;
            $nombre = 'noticia'.$noticias.$imagen->getClientOriginalExtension();
            $imagen->move(public_path('storage/noticias'),$nombre);
            $pub = new Publicacion([
                'titulo' => $request['titulo'],
                'texto' => $request['texto'],
                'imagen' => $nombre,
                'idTipo' => $tipo
            ]);
            $pub ->save();
        }
        if($request['tipo'] =='Calificaciones'){
            $pdf = $request->file('imagen');
            $grupo = $request['grupo'];
            $nombre = $grupo.'_calificaciones'.$pdf->getClientOriginalExtension();
            $pdf->move(public_path('storage/calificaciones'),$nombre);
            $pub = new Publicacion([
                'titulo' => $request['titulo'],
                'texto' => $request['texto'],
                'imagen' => $nombre,
                'idTipo' => $tipo
                ]);
            $pub ->save();
        }
        if($request['tipo'] =='Eventos'){
            $eventos = Publicacion::where('idTipo',$tipo)->count()+1;
            $nombre = 'evento'.$eventos.$imagen->getClientOriginalExtension();
            $imagen->move(public_path('storage/noticias'),$nombre);
            $pub = new Publicacion([
                'titulo' => $request['titulo'],
                'texto' => $request['texto'],
                'imagen' => $nombre,
                'idTipo' => $tipo
            ]);
            $pub ->save();
        }
        if($request['tipo'] == 'Personal'){
            $personal = Publicacion::where('idTipo',$tipo)->count()+1;
            $nombre = 'personal'.$personal.$imagen->getClientOriginalExtension();
            $imagen->move(public_path('storage/noticias'),$nombre);
            $pub = new Publicacion([
                'titulo' => $request['titulo'],
                'texto' => $request['texto'],
                'imagen' => $nombre,
                'idTipo' => $tipo
            ]);
            $pub ->save();

        }
        if($request['tipo'] =='Plan de estudios'){
            $reuniones = Publicacion::where('idTipo',$tipo)->count()+1;
            $nombre = 'plandeestudios'.$imagen->getClientOriginalExtension();
            $imagen->move(public_path('storage/noticias'),$nombre);
            $pub = new Publicacion([
                'titulo' => $request['titulo'],
                'texto' => $request['texto'],
                'imagen' => $nombre,
                'idTipo' => $tipo
            ]);
            $pub ->save();
        }
        if($request['tipo'] == 'Reuniones'){
            $reuniones = Publicacion::where('idTipo',$tipo)->count()+1;
            $nombre = 'reuniones'.$reuniones.$imagen->getClientOriginalExtension();
            $imagen->move(public_path('storage/noticias'),$nombre);
            $pub = new Publicacion([
                'titulo' => $request['titulo'],
                'texto' => $request['texto'],
                'imagen' => $nombre,
                'idTipo' => $tipo
            ]);
            $pub ->save();
        }
        Publicacion::create($request->all());
        return response()->json(['Ok'],200);
    }

    public function show($id)
    {
        $publicacion = Publicacion::where('idPublicacion',$id)
            ->first();
        return response()->json($publicacion,200);
    }

    public function update(Request $request, $id)
    {
        Publicacion::findOrFail($id)->update($request->all());
        return response()->json(['Ok'],200);
    }

    public function destroy($id)
    {
        Publicacion::findOrFail($id)->delete();
        return response()->json(['Ok'],200);
    }
}
