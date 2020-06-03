<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{

    public function index()
    {
        $lista = Banner::select('idBanner','titulo','archivo')
            ->get();
        return response()->json($lista,200);
        //
    }


    public function store(Request $request)
    {
        $imagen = $request->file('archivo');
        $nombre = 'banner'.$imagen->getFilename().'.'.$imagen->getClientOriginalExtension();
        $banner = new Banner([
            'idBanner' => Banner::select('titulo')->count() +1 ,
            'titulo' => $request->input('titulo'),
            'archivo'=> $nombre,
        ]);
        $banner->save();
        //Banner::create($banner);
        $imagen->move(public_path('storage/imagenes'),$nombre);
        return response()->json(['Ok'],200);
    }

    public function show($id)
    {
        $banner = Banner::where('idBanner',$id)
            ->first();
        return response()->json($banner,200);
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'archivo' => 'required',

        ]);

        $update = ['titulo' => $request->titulo, 'archivo' => $request->archivo];
        Banner::where('idBanner',$id)->update($update);
        return response()->json(['Ok'],200);
    }


    public function destroy($id)
    {
        Banner::where('idBanner',$id)->delete();
        return response()->json(['Ok'],200);
    }
}
