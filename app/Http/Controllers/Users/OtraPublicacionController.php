<?php

namespace App\Http\Controllers\Users;

use App\Models\OtraPublicacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublicacion;
use App\Http\Requests\UpdatePublicacion;
use App\Models\TipoPublicacion;

class OtraPublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = OtraPublicacion::where('user_id', auth()->id())->get();
        return view('users.otras_publicaciones.index', compact('publicaciones'));
    }


    public function create()
    {
        $publicaciones = TipoPublicacion::all();
        return view('users.otras_publicaciones.create', compact('publicaciones'));
    }
    

    public function store(StorePublicacion $request)
    {
        $otraspublicaciones = new OtraPublicacion([
            'titulo' => $request->titulo,
            'fecha' => $request->fecha,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial,
            'entidad_financiera' => $request->entidad_financiera,
            'id_publicacion' => $request->id_publicacion
        ]);

        $otraspublicaciones->user_id = auth()->id();
        $otraspublicaciones->save();

        
        return redirect()->route('users.otras_publicaciones.index')->with('success', 'Registro creado con éxito!');
    }


    public function edit(OtraPublicacion $otras_publicacione)
    {
    $publicaciones = TipoPublicacion::all();
    return view('users.otras_publicaciones.edit', compact('otras_publicacione', 'publicaciones'));
    }


    public function update(UpdatePublicacion $request, OtraPublicacion $otras_publicacione)
    {

        $otras_publicacione->update([
            'titulo' => $request->titulo,
            'fecha' => $request->fecha,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial,
            'entidad_financiera' => $request->entidad_financiera,
            'id_publicacion' => $request->id_publicacion
        ]);

        return redirect()->route('users.otras_publicaciones.index')->with('success', 'Registro actualizado con éxito!!');
    }


    public function destroy(OtraPublicacion $otras_publicacione)
    {
        $otras_publicacione->delete();
        return redirect()->route('users.otras_publicaciones.index')->with('success', 'Registro eliminado.');
    }
}
