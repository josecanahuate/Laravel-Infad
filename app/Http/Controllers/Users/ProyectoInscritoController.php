<?php

namespace App\Http\Controllers\Users;

use App\Models\ProyectoInscrito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AreaInvestigacion;
use App\Models\Facultades;
use App\Models\ProgramaAdscribe;
use App\Models\Sede;

class ProyectoInscritoController extends Controller
{
    public function index()
    {
        $proyectos = ProyectoInscrito::where('user_id', auth()->id())->get();
        return view('users.proyectos_inscritos.index', compact('proyectos'));
    }

    public function create()
    {
        $areas = AreaInvestigacion::all();
        $sedes = Sede::all();
        $facultades = Facultades::all();
        $programas = ProgramaAdscribe::all();
        return view('users.proyectos_inscritos.create', compact('areas', 'sedes', 'facultades', 'programas'));
    }


    public function store(Request $request)
    {
        $proyectosinscritos = new ProyectoInscrito([
            'sector_pertenece' => $request->sector_pertenece,
            'id_area_investigacion' => $request->id_area_investigacion,
            'linea_investigacion' => $request->linea_investigacion,
            'id_programa_adscribe' => $request->id_programa_adscribe,
            'id_sede' => $request->id_sede,
            'id_facultad' => $request->id_facultad,
            
            'titulo_investigacion' => $request->titulo_investigacion,
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
            'titulo_investigacion' => 'required|string|max:255',
            /* 'sector_pertenece' => 'required|string|max:255',
            'linea_investigacion' => 'required|string|max:255', */
            'periodo_vigencia_ini' => 'required|date',
            'periodo_vigencia_fin' => 'required|date',
            /* 'estado_actual' => 'nullable|string|max:255', */
            'entidad_financiera' => 'nullable|string',
            'monto_asignado' => 'integer',
            'sitio_web' => 'nullable|string',
            'enlace_video' => 'nullable|string',
        ]);

        $proyectos_inscrito->update([
            'sector_pertenece' => $request->sector_pertenece,
            'id_area_investigacion' => $request->id_area_investigacion,
            'linea_investigacion' => $request->linea_investigacion,
            'id_programa_adscribe' => $request->id_programa_adscribe,
            'id_sede' => $request->id_sede,
            'id_facultad' => $request->id_facultad,
            'titulo_investigacion' => $request->titulo_investigacion,
            'periodo_vigencia_ini' => $request->periodo_vigencia_ini,
            'periodo_vigencia_fin' => $request->periodo_vigencia_fin,
            'estado_actual' => $request->estado_actual,
            'entidad_financiera' => $request->entidad_financiera,
            'monto_asignado' => $request->monto_asignado,
            'sitio_web' => $request->sitio_web,
            'enlace_video,' => $request->enlace_video,
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
