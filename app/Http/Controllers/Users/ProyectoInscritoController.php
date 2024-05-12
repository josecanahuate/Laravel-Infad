<?php

namespace App\Http\Controllers\Users;

use App\Models\ProyectoInscrito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProyectoInscritoController extends Controller
{
    public function index()
    {
        $proyectos = ProyectoInscrito::where('user_id', auth()->id())->get();
        return view('users.proyectos_inscritos.index', compact('proyectos'));
    }


    public function create()
    {
        return view('users.proyectos_inscritos.create');
    }


    public function store(Request $request)
    {
        $proyectosinscritos = new ProyectoInscrito([
            'titulo_investigacion' => $request->titulo_investigacion,
            'sector_pertenece' => $request->sector_pertenece, //enum
            'linea_investigacion' => $request->linea_investigacion,
            'periodo_vigencia_ini' => $request->periodo_vigencia_ini,
            'periodo_vigencia_fin' => $request->periodo_vigencia_fin,
            'estado_actual' => $request->estado_actual,
            'entidad_financiera' => $request->entidad_financiera,
            'monto_asignado' => $request->monto_asignado,
            'sitio_web' => $request->sitio_web,
            'enlace_video,' => $request->enlace_video,
            /* 'ruta,' => $request->ruta, */
        ]);
        $proyectosinscritos->user_id = auth()->id();
        $proyectosinscritos->save();

        return redirect()->route('users.proyectos_inscritos.index')->with('success', 'Registro creado con éxito!');
    }


    public function edit(ProyectoInscrito $proyectos_inscrito)
    {
    return view('users.proyectos_inscritos.edit', compact('proyectos_inscrito'));
    }


    public function update(Request $request, ProyectoInscrito $proyectos_inscrito)
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

        $proyectos_inscrito->update([
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

        return redirect()->route('users.proyectos_inscritos.index')->with('success', 'Registro actualizado con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProyectoInscrito $proyectos_inscrito)
    {
        $proyectos_inscrito->delete();
        return redirect()->route('users.proyectos_inscritos.index')->with('success', 'Registro eliminado.');
    }
}
