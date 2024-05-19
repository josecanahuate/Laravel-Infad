<?php

namespace App\Http\Controllers\Users;

use App\Models\ProyectoInscrito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AreaInvestigacion;

class ProyectoInscritoController extends Controller
{
    public function index()
    {
        $proyectos = ProyectoInscrito::where('user_id', auth()->id())->get();
        return view('users.proyectos_inscritos.index', compact('proyectos'));
    }

/* 
    public function create()
    {
        return view('users.proyectos_inscritos.create');
    }
 */

    public function create()
    {
        //$areas = AreaInvestigacion::pluck('nombreainvest', 'id_areainv'); //pluck->relacion
        $areas = AreaInvestigacion::all();
        return view('users.proyectos_inscritos.create', compact('areas'));
        //return view('admin.posts.create', compact('categories', 'areas'));
    }


    public function store(Request $request)
    {
        $proyectosinscritos = new ProyectoInscrito([
            'titulo_investigacion' => $request->titulo_investigacion,
            'sector_pertenece' => $request->sector_pertenece,
            'linea_investigacion' => $request->linea_investigacion,
            'periodo_vigencia_ini' => $request->periodo_vigencia_ini,
            'periodo_vigencia_fin' => $request->periodo_vigencia_fin,
            'estado_actual' => $request->estado_actual,
            'entidad_financiera' => $request->entidad_financiera,
            'monto_asignado' => $request->monto_asignado,
            'sitio_web' => $request->sitio_web,
            'enlace_video,' => $request->enlace_video,
            /* 'ruta,' => $request->ruta, */

            //PARA CAMPOS RELACIONADOS QUE SE RECUPERAN EN EL FORMULARIO
/*             $departamento = Departamento::find($request->departamento_id); // Suponiendo que el campo de selección se llama "departamento_id"
            $modelo->departamento()->associate($departamento); // Asociar el departamento al modelo */
        ]);

        /*if($request->areas) {
            $proyectosinscritos->areas()->attach($request->areas);
        }*/

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
