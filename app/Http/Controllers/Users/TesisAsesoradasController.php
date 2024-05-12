<?php
namespace App\Http\Controllers\Users;

use App\Models\TesiAsesorada;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TesisAsesoradasController extends Controller
{
    public function index()
    {
        $tesis = TesiAsesorada::where('user_id', auth()->id())->get();
        return view('users.tesis_asesoradas.index', compact('tesis'));
    }


    public function create()
    {
        return view('users.tesis_asesoradas.create');
    }


    public function store(Request $request)
    {
        $tesisasesoradas = new TesiAsesorada([
            'titulo' => $request->titulo,
            'fecha_sustentacion' => $request->fecha_sustentacion,
            'pais' => $request->pais,
            'publicacion_revista' => $request->publicacion_revista,
            'financiacion_externa' => $request->financiacion_externa
            /* 'ruta' => $request->ruta */
        ]);
        $tesisasesoradas->user_id = auth()->id();
        $tesisasesoradas->save();

        return redirect()->route('users.tesis_asesoradas.index')->with('success', 'Registro creado con éxito!');
    }


    public function edit(TesiAsesorada $tesis_asesorada)
    {
    return view('users.tesis_asesoradas.edit', compact('tesis_asesorada'));
    }


    public function update(Request $request, TesiAsesorada $tesis_asesorada)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha_sustentacion' => 'nullable | date',
            'pais' => 'nullable',
            'publicacion_revista' => 'nullable|in:No,Si',
            'financiacion_externa' => 'nullable|in:No,Si',
            /* 'ruta' => $request->ruta */
        ]);

        $tesis_asesorada->update([
            'titulo' => $request->titulo,
            'fecha_sustentacion' => $request->fecha_sustentacion,
            'pais' => $request->pais,
            'publicacion_revista' => $request->publicacion_revista,
            'financiacion_externa' => $request->financiacion_externa
            /* 'ruta' => $request->ruta */
        ]);

        return redirect()->route('users.tesis_asesoradas.index')->with('success', 'Registro actualizado con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TesiAsesorada $tesis_asesorada)
    {
        $tesis_asesorada->delete();
        return redirect()->route('users.tesis_asesoradas.index')->with('success', 'Registro eliminado.');
    }
}
