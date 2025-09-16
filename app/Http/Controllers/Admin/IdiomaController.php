<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    //muestra todos los registros de experiencias laborales
    public function index()
    {
        $idiomas = Idioma::all();
        return view('admin.idiomas.index', compact('idiomas'));
    }

    public function show()
    {
        $idiomas = Idioma::with('user:id,name')->get();
        return ($idiomas);
    }
}
