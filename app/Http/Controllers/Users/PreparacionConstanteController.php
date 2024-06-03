<?php

namespace App\Http\Controllers\Users;

use App\Models\PreparacionConstante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartConstanteStore;
use App\Http\Requests\UpdatePartConstante;
use App\Models\EnfasisActualizacion;

class PreparacionConstanteController extends Controller
{
    public function index()
    {
        $constantes = PreparacionConstante::where('user_id', auth()->id())->get();
        //$constantes = PreparacionConstante::where('user_id', auth()->id())->with('enfasisActualizacion')->get();
        return view('users.preparacion_constante.index', compact('constantes'));
    }


    public function create()
    {
        $enfasis = EnfasisActualizacion::all();
        return view('users.preparacion_constante.create', compact('enfasis'));
    }


    public function store(PartConstanteStore $request)
    {
        $preparacionconstante = new PreparacionConstante([
            'id_enfasis_actualizacion' => $request->id_enfasis_actualizacion,
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


    public function update(UpdatePartConstante $request, PreparacionConstante $preparacion_constante)
    {
        $preparacion_constante->update([
            'id_enfasis_actualizacion' => $request->id_enfasis_actualizacion,
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
