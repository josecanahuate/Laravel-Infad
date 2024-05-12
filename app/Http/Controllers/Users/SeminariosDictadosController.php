<?php

namespace App\Http\Controllers\Users;

use App\Models\SeminarioDictado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeminariosDictadosController extends Controller
{
    public function index()
    {
        $seminarios = SeminarioDictado::where('user_id', auth()->id())->get();
        return view('users.seminarios_dictados.index', compact('seminarios'));
    }


    public function create()
    {
        return view('users.seminarios_dictados.create');
    }


    public function store(Request $request)
    {
        $seminariosdictados = new SeminarioDictado([
            'titulo' => $request->titulo,
            'institucion' => $request->institucion,
            'facilitador' => $request->facilitador,
            'fecha_ini' => $request->fecha_ini,
            'fecha_fin' => $request->fecha_fin,
            'pais' => $request->pais,
            'modalidad' => $request->modalidad,
            'lugar' => $request->lugar,
            'horas' => $request->horas,
            'tipo_participacion,' => $request->tipo_participacion,
            /* 'ruta,' => $request->ruta, */
        ]);
        $seminariosdictados->user_id = auth()->id();
        $seminariosdictados->save();

        return redirect()->route('users.seminarios_dictados.index')->with('success', 'Registro creado con éxito!');
    }


    public function edit(SeminarioDictado $seminarios_dictado)
    {
    return view('users.seminarios_dictados.edit', compact('seminarios_dictado'));
    }


    public function update(Request $request, SeminarioDictado $seminarios_dictado)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'facilitador' => 'required|string|max:255',
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date',
            'pais' => 'string|max:255',
            'modalidad' => 'required|in:Presencial,Virtual,Semi-presencial',
            'lugar' => 'string|max:255',
            'horas' => 'integer',
            'tipo_participacion' => 'required|in:Presentador Principal,Asistente,Coordinador,Organizador,Evaluador'
        ]);

        $seminarios_dictado->update([
            'titulo' => $request->titulo,
            'institucion' => $request->institucion,
            'facilitador' => $request->facilitador,
            'fecha_ini' => $request->fecha_ini,
            'fecha_fin' => $request->fecha_fin,
            'pais' => $request->pais,
            'modalidad' => $request->modalidad,
            'lugar' => $request->lugar,
            'horas' => $request->horas,
            'tipo_participacion,' => $request->tipo_participacion,
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
