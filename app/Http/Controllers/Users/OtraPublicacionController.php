<?php

namespace App\Http\Controllers\Users;

use App\Models\OtraPublicacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AreaInvestigacion;
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
    

    public function store(Request $request)
    {
        $request->validate([
            'id_publicacion' => 'required|exists:tp_publicacion,idpublicacion',
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'isbn' => 'nullable|string',
            'editorial' => 'string'
        ]);

        $otraspublicaciones = new OtraPublicacion([
            'id_publicacion' => $request->id_publicacion,
            'titulo' => $request->titulo,
            'fecha' => $request->fecha,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial
        ]);

        $otraspublicaciones->user_id = auth()->id();
        $otraspublicaciones->save();

        
        return redirect()->route('users.otras_publicaciones.index')->with('success', 'Registro creado con éxito!');
    }


    public function edit(OtraPublicacion $otras_publicacione)
    {
    return view('users.otras_publicaciones.edit', compact('otras_publicacione'));
    }


    public function update(Request $request, OtraPublicacion $otras_publicacione)
    {

        $otras_publicacione->update([
            'id_publicacion' => $request->id_publicacion,
            'titulo' => $request->titulo,
            'fecha' => $request->fecha,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial
        ]);

        return redirect()->route('users.otras_publicaciones.index')->with('success', 'Registro actualizado con éxito!!');
    }


    public function destroy(OtraPublicacion $otras_publicacione)
    {
        $otras_publicacione->delete();
        return redirect()->route('users.otras_publicaciones.index')->with('success', 'Registro eliminado.');
    }
}
