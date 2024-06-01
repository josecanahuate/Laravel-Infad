<?php

namespace App\Http\Controllers\Users;

use App\Models\PreparacionFormal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartFormalStore;
use App\Http\Requests\UpdatePartFormal;
use App\Models\GradoAcademico;

class PreparacionFormalController extends Controller
{
    public function index()
    {
        $formales = PreparacionFormal::where('user_id', auth()->id())->get();
        return view('users.preparacion_formal.index', compact('formales'));
    }


    public function create()
    {
        $grados = GradoAcademico::all();
        return view('users.preparacion_formal.create', compact('grados'));
    }


    public function store(PartFormalStore $request)
    {
        $preparacionformal = new PreparacionFormal([
            'estatus_prepformal' => $request->estatus_prepformal,
            'titulo' => $request->titulo,
            'ano_titulo' => $request->ano_titulo,
            'pais' => $request->pais,
            'tipo' => $request->tipo,
            'modalidad' => $request->modalidad,
            'institucion_superior' => $request->institucion_superior,
            'financiamiento' => $request->financiamiento
            /* 'ruta' => $request->ruta */
        ]);
        $preparacionformal->user_id = auth()->id();
        $preparacionformal->save();

        return redirect()->route('users.preparacion_formal.index')->with('success', 'Registro creado con éxito!');
    }


    public function edit(PreparacionFormal $preparacion_formal)
    {
    return view('users.preparacion_formal.edit', compact('preparacion_formal'));
    }


    public function update(UpdatePartFormal $request, PreparacionFormal $preparacion_formal)
    {
        $preparacion_formal->update([
            'estatus_prepformal' => $request->estatus_prepformal,
            'titulo' => $request->titulo,
            'ano_titulo' => $request->ano_titulo,
            'pais' => $request->pais,
            'tipo' => $request->tipo,
            'modalidad' => $request->modalidad,
            'institucion_superior' => $request->institucion_superior,
            'financiamiento' => $request->financiamiento,
            /* 'ruta' => $request->ruta */
        ]);

        return redirect()->route('users.preparacion_formal.index')->with('success', 'Registro actualizado con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreparacionFormal $preparacion_formal)
    {
        $preparacion_formal->delete();
        return redirect()->route('users.preparacion_formal.index')->with('success', 'Registro eliminado.');
    }
}
