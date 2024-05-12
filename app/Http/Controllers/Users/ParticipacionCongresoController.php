<?php

namespace App\Http\Controllers\Users;

use App\Models\ParticipacionCongreso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParCongresoStore;

class ParticipacionCongresoController extends Controller
{
    public function index()
    {
        $congresos = ParticipacionCongreso::where('user_id', auth()->id())->get();
        return view('users.participacion_congreso.index', compact('congresos'));
    }


    public function create()
    {
        return view('users.participacion_congreso.create');
    }


    public function store(ParCongresoStore $request)
    {
        $participacioncongreso = new ParticipacionCongreso([
            'titulo' => $request->titulo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'lugar_congreso' => $request->lugar_congreso,
            'pais' => $request->pais,
            'publicacion_proceeding' => $request->publicacion_proceeding,
            'tipo_participaciones' => $request->tipo_participaciones
            /* 'ruta' => $request->ruta */
        ]);
        $participacioncongreso->user_id = auth()->id();
        $participacioncongreso->save();

        return redirect()->route('users.participacion_congreso.index')->with('success', 'Registro creado con éxito!');
    }


    public function edit(ParticipacionCongreso $participacion_congreso)
    {
    return view('users.participacion_congreso.edit', compact('participacion_congreso'));
    }


    public function update(Request $request, ParticipacionCongreso $participacion_congreso)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha_inicio' => 'nullable | date',
            'fecha_fin' => 'nullable | date',
            'lugar_congreso' => 'nullable|string',
            'pais' => 'nullable',
            'publicacion_proceeding' => 'nullable|in:Presentado y Aceptado,Presentado pero no Aceptado,No Presentado,Provisional',
            'tipo_participaciones' => 'required|in:Presentador Principal,Asistente,Coordinador,Organizador,Evaluador'
            /* 'ruta' => $request->ruta */
        ]);

        $participacion_congreso->update([
            'titulo' => $request->titulo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'lugar_congreso' => $request->lugar_congreso,
            'pais' => $request->pais,
            'publicacion_proceeding' => $request->publicacion_proceeding,
            'tipo_participaciones' => $request->tipo_participaciones
            /* 'ruta' => $request->ruta */
        ]);

        return redirect()->route('users.participacion_congreso.index')->with('success', 'Registro actualizado con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParticipacionCongreso $participacion_congreso)
    {
        $participacion_congreso->delete();
        return redirect()->route('users.participacion_congreso.index')->with('success', 'Registro eliminado.');
    }
}
