<?php

namespace App\Http\Controllers\Users;

use App\Models\SeminarioDictado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeminarioStore;
use App\Http\Requests\UpdateSeminarios;

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


    public function store(SeminarioStore $request)
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


    public function update(UpdateSeminarios $request, SeminarioDictado $seminarios_dictado)
    {
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
