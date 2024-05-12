<?php

namespace App\Http\Controllers\Users;

use App\Models\ExperienciaLaboral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmpleo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class ExperienciaLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiencias = ExperienciaLaboral::where('user_id', auth()->id())->get();
        return view('users.empleos.index', compact('experiencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.empleos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpleo $request)
    {
        $experiencia = new ExperienciaLaboral([
            'empresa' => $request->empresa,
            'cargo' => $request->cargo,
            'estatus_empleo' => $request->estatus_empleo,
            'sector_empresa' => $request->sector_empresa,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'pais' => $request->pais
        ]);
        $experiencia->user_id = auth()->id();
        $experiencia->save();

        return redirect()->route('users.empleos.index')->with('success', 'Empleo creado con éxito!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExperienciaLaboral $experienciaLaboral)
    {
        return view('users.empleos.edit', compact('experienciaLaboral'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExperienciaLaboral $experienciaLaboral)
    {
        $request->validate([
            'empresa' => 'required|max:255',
            'cargo' => 'required|string',
            'estatus_empleo' => 'required|in:Concluido,Actualmente laborando',
            'sector_empresa' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'date|after_or_equal:fecha_inicio',
            'pais' => 'string'
            /* 'estatus' => 'required|string|in:pendiente,aprobado,rechazado', */
        ]);

        // Actualizar la experiencia laboral
        $experienciaLaboral->update([
            'empresa' => $request->empresa,
            'cargo' => $request->cargo,
            'estatus_empleo' => $request->estatus_empleo,
            'sector_empresa' => $request->sector_empresa,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'pais' => $request->pais
        ]);

        return redirect()->route('users.empleos.index')->with('success', 'Empleo actualizado con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExperienciaLaboral $experienciaLaboral)
    {
        $experienciaLaboral->delete();
        return redirect()->route('users.empleos.index')->with('success', 'Empleo eliminado.');
    }
}
