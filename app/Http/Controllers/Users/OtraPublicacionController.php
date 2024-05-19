<?php

namespace App\Http\Controllers\Users;

use App\Models\OtraPublicacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AreaInvestigacion;

class OtraPublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = OtraPublicacion::where('user_id', auth()->id())->get();
        return view('users.otras_publicaciones.index', compact('publicaciones'));
    }


    
    public function create()
    {
        return view('users.otras_publicaciones.create');
    }
    


    public function store(Request $request)
    {

        //$otraspublicaciones = OtraPublicacion::create($request->all());
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'isbn' => 'nullable|string',
            'editorial' => 'string'
        ]);

        $otraspublicaciones = new OtraPublicacion([
            'titulo' => $request->titulo,
            'fecha' => $request->fecha,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial

            //PARA CAMPOS RELACIONADOS QUE SE RECUPERAN EN EL FORMULARIO
/*             $departamento = Departamento::find($request->departamento_id); // Suponiendo que el campo de selección se llama "departamento_id"
            $modelo->departamento()->associate($departamento); // Asociar el departamento al modelo */
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
