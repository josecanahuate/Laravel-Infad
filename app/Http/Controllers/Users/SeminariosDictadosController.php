<?php

namespace App\Http\Controllers\Users;

use App\Models\SeminarioDictado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeminarioStore;
use App\Http\Requests\UpdateSeminarios;
use App\Models\TipoParticipacion;

class SeminariosDictadosController extends Controller
{
    public function index()
    {
        $seminarios = SeminarioDictado::where('user_id', auth()->id())->get();
        return view('users.seminarios_dictados.index', compact('seminarios'));
    }


    public function create()
    {
        $participaciones = TipoParticipacion::all();
        return view('users.seminarios_dictados.create', compact('participaciones'));
    }


    public function store(SeminarioStore $request)
    {

        //dd($request->all());

        $seminariosdictados = new SeminarioDictado([
            'id_tipo_participacion' => $request->id_tipo_participacion,
            'titulo' => $request->titulo,
            'institucion' => $request->institucion,
            'facilitador' => $request->facilitador,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'pais' => $request->pais,
            'modalidad' => $request->modalidad,
            'lugar' => $request->lugar,
            'horas' => $request->horas
            /* 'ruta,' => $request->ruta, */
        ]);
        $seminariosdictados->user_id = auth()->id();
        $seminariosdictados->save();

        return redirect()->route('users.seminarios_dictados.index')->with('success', 'Registro creado con éxito!');
    }


    public function edit(SeminarioDictado $seminarios_dictado)
    {
    $participaciones = TipoParticipacion::all();
    return view('users.seminarios_dictados.edit', compact('seminarios_dictado', 'participaciones'));
    }


    public function update(UpdateSeminarios $request, SeminarioDictado $seminarios_dictado)
    {
        $seminarios_dictado->update([
            'id_tipo_participacion' => $request->id_tipo_participacion,
            'titulo' => $request->titulo,
            'institucion' => $request->institucion,
            'facilitador' => $request->facilitador,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'pais' => $request->pais,
            'modalidad' => $request->modalidad,
            'lugar' => $request->lugar,
            'horas' => $request->horas
        ]);

        return redirect()->route('users.seminarios_dictados.index')->with('success', 'Registro actualizado con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeminarioDictado $seminarios_dictado)
    {
        $seminarios_dictado->delete();
        return redirect()->route('users.seminarios_dictados.index')->with('success', 'Registro eliminado.');
    }
}
