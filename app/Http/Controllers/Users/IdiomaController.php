<?php

namespace App\Http\Controllers\Users;

use App\Models\Idioma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIdioma;
use App\Http\Requests\UpdateIdioma;

class IdiomaController extends Controller
{

    public function index()
    {
        $idiomas = Idioma::where('user_id', auth()->id())->get();
        return view('users.idiomas.index', compact('idiomas'));
    }


    public function create()
    {
        return view('users.idiomas.create');
    }


    /* public function store(Request $request) */
    public function store(StoreIdioma $request)
    {
        $idioma = new Idioma([
            'institucion' => $request->institucion,
            'idioma' => $request->idioma,
            'lee_nivel' => $request->lee_nivel,
            'escribe_nivel' => $request->escribe_nivel,
            'habla_nivel' => $request->habla_nivel,
            'comprende_nivel' => $request->comprende_nivel,
            /* 'ruta' => $request->ruta */
        ]);
        $idioma->user_id = auth()->id();
        $idioma->save();

        return redirect()->route('users.idiomas.index')->with('success', 'Idioma creado con éxito!');
    }


    public function edit(Idioma $idioma)
    {
        return view('users.idiomas.edit', compact('idioma'));
    }


    public function update(UpdateIdioma $request, Idioma $idioma)
    {
        $idioma->update([
            'institucion' => $request->institucion,
            'idioma' => $request->idioma,
            'lee_nivel' => $request->lee_nivel,
            'escribe_nivel' => $request->escribe_nivel,
            'habla_nivel' => $request->habla_nivel,
            'comprende_nivel' => $request->comprende_nivel,
            /* 'ruta' => $request->ruta */
        ]);

        return redirect()->route('users.idiomas.index')->with('success', 'Idioma actualizado con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idioma $idioma)
    {
        $idioma->delete();
        return redirect()->route('users.idiomas.index')->with('success', 'Idioma eliminado.');
    }
}
