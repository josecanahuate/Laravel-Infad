<?php

namespace App\Http\Controllers\Users;

use App\Models\ParticipacionCongreso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParCongresoStore;
use App\Http\Requests\UpdateParCongreso;
use App\Models\TipoParticipacion;

class ParticipacionCongresoController extends Controller
{
    public function index()
    {
        $congresos = ParticipacionCongreso::where('user_id', auth()->id())->get();
        return view('users.participacion_congreso.index', compact('congresos'));
    }


    public function create()
    {
        $participaciones = TipoParticipacion::all();
        return view('users.participacion_congreso.create', compact('participaciones'));
    }


    public function store(ParCongresoStore $request)
    {
        $participacioncongreso = new ParticipacionCongreso([
            'id_tipo_participacion' => $request->id_tipo_participacion,
            'titulo' => $request->titulo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'lugar_congreso' => $request->lugar_congreso,
            'pais' => $request->pais,
            'publicacion_proceeding' => $request->publicacion_proceeding,
            /* 'ruta' => $request->ruta */
        ]);
        $participacioncongreso->user_id = auth()->id();
        $participacioncongreso->save();

        return redirect()->route('users.participacion_congreso.index')->with('success', 'Registro creado con éxito!');
    }


    public function edit(ParticipacionCongreso $participacion_congreso)
    {
    $participaciones = TipoParticipacion::all();
    return view('users.participacion_congreso.edit', compact('participacion_congreso', 'participaciones'));
    }


    public function update(UpdateParCongreso $request, ParticipacionCongreso $participacion_congreso)
    {

        $participacion_congreso->update([
            'id_tipo_participacion' => $request->id_tipo_participacion,
            'titulo' => $request->titulo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'lugar_congreso' => $request->lugar_congreso,
            'pais' => $request->pais,
            'publicacion_proceeding' => $request->publicacion_proceeding
            /* 'ruta' => $request->ruta */
        ]);

        return redirect()->route('users.participacion_congreso.index')->with('success', 'Registro actualizado con éxito!!');
    }

    public function destroy(ParticipacionCongreso $participacion_congreso)
    {
        $participacion_congreso->delete();
        return redirect()->route('users.participacion_congreso.index')->with('success', 'Registro eliminado.');
    }
}
