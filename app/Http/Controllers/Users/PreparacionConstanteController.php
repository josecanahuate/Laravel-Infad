<?php

namespace App\Http\Controllers\Users;

use App\Models\PreparacionConstante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreparacionConstanteController extends Controller
{
    public function index()
    {
        $constantes = PreparacionConstante::where('user_id', auth()->id())->get();
        return view('users.preparacion_constante.index', compact('constantes'));
    }


    public function create()
    {
        return view('users.preparacion_constante.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:255',
            'centro_estudio' => 'required',
            'modalidad' => 'required|in:Presencial,Virtual,Semi-presencial',
            'pais' => 'required|string|max:255',
            'estatus_prepconstante' => 'required|in:Cursando Actualmente,Completo',
            'duracion' => 'required',
            'ano_titulo' => 'nullable',
            /* 'ruta' => 'required' */
        ]);


        $preparacionconstante = new PreparacionConstante([
            'titulo' => $request->titulo,
            'centro_estudio' => $request->centro_estudio,
            'modalidad' => $request->modalidad,
            'pais' => $request->pais,
            'estatus_prepconstante' => $request->estatus_prepconstante,
            'duracion' => $request->duracion,
            'ano_titulo' => $request->ano_titulo,
            /* 'ruta' => $request->ruta */
        ]);
        $preparacionconstante->user_id = auth()->id();
        $preparacionconstante->save();

        return redirect()->route('users.preparacion_constante.index')->with('success', 'Registro creado con éxito!');
    }


    public function edit(PreparacionConstante $preparacion_constante)
    {
    return view('users.preparacion_constante.edit', compact('preparacion_constante'));
    }


    public function update(Request $request, PreparacionConstante $preparacion_constante)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'centro_estudio' => 'required',
            'modalidad' => 'required|in:Presencial,Virtual,Semi-presencial',
            'pais' => 'required|string|max:255',
            'estatus_prepconstante' => 'required|in:Cursando Actualmente,Completo',
            'duracion' => 'required',
            'ano_titulo' => 'nullable'
            /* 'ruta' => 'required' */
        ]);

        $preparacion_constante->update([
            'titulo' => $request->titulo,
            'centro_estudio' => $request->centro_estudio,
            'modalidad' => $request->modalidad,
            'pais' => $request->pais,
            'estatus_prepconstante' => $request->estatus_prepconstante,
            'duracion' => $request->duracion,
            'ano_titulo' => $request->ano_titulo,
            /* 'ruta' => $request->ruta */
        ]);

        return redirect()->route('users.preparacion_constante.index')->with('success', 'Registro actualizado con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreparacionConstante $preparacion_constante)
    {
        $preparacion_constante->delete();
        return redirect()->route('users.preparacion_constante.index')->with('success', 'Registro eliminado.');
    }
}
