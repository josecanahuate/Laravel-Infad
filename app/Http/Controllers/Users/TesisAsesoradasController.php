<?php
namespace App\Http\Controllers\Users;

use App\Models\TesiAsesorada;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TesiStore;
use App\Http\Requests\UpdateTesis;
use App\Models\AreaInvestigacion;
use App\Models\Facultades;
use App\Models\GradoAcademico;
use App\Models\ProgramaAdscribe;
use App\Models\Sede;

class TesisAsesoradasController extends Controller
{
    public function index()
    {
        $tesis = TesiAsesorada::where('user_id', auth()->id())->get();
        return view('users.tesis_asesoradas.index', compact('tesis'));
    }


    public function create()
    {
        $areas = AreaInvestigacion::all();
        $grados = GradoAcademico::all();
        $facultades = Facultades::all();
        return view('users.tesis_asesoradas.create', compact('areas', 'grados', 'facultades'));
    }


    public function store(TesiStore $request)
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
        //$categories = Category::pluck('name', 'id'); //pluck->relacion
        $areas = AreaInvestigacion::all();
        return view('users.tesis_asesoradas.edit', compact('tesis_asesorada','areas'));
    }

    

    public function update(UpdateTesis $request, TesiAsesorada $tesis_asesorada)
    {
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
