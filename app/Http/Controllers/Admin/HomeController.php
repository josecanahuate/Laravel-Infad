<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExperienciaLaboral;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $experiencias = ExperienciaLaboral::select('id', 'user_id', 'empresa', 'cargo', 'sector_empresa', 'estatus_empleo', 'pais', 'fecha_inicio', 'fecha_fin')
            ->with('user:id,name') // Esto es para obtener el nombre del usuario relacionado
            ->get();

        return view('admin.historial_laboral.index', compact('experiencias'));
    }


    public function show()
    {
        $experiencias = ExperienciaLaboral::with('user:id,name')->get();
        return ($experiencias);
    }
}
