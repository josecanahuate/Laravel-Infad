<?php

namespace App\Http\Controllers\Users;

use App\Models\Idioma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIdioma;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateIdioma;
use App\Models\Archivo;
use Illuminate\Support\Facades\File;

class IdiomaController extends Controller
{

    public function index()
    {
        $idiomas = Idioma::where('user_id', auth()->id())->get();
        return view('users.idiomas.index', compact('idiomas'));
    }


    public function create(Idioma $idioma)
    {
        $archivos = Archivo::where('user_id', auth()->id())
            ->where('idioma_id', $idioma->id)
            ->get();
        return view('users.idiomas.create', compact('archivos'));
    }

    public function store(StoreIdioma $request)
    {
        $idioma = new Idioma([
            'institucion' => $request->institucion,
            'idioma' => $request->idioma,
            'lee_nivel' => $request->lee_nivel,
            'escribe_nivel' => $request->escribe_nivel,
            'habla_nivel' => $request->habla_nivel,
            'comprende_nivel' => $request->comprende_nivel,
        ]);

        $idioma->user_id = auth()->id();
        $idioma->save();

        // Manejar la subida de archivos
        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $file) {
                $path = $file->store('archivos');

                Archivo::create([
                    'user_id' => auth()->id(),
                    'idioma_id' => $idioma->id,
                    'nombre_archivo' => $file->getClientOriginalName(),
                    'ruta' => $path,
                    'tipo_archivo' => $file->getMimeType()
                ]);
            }
        }

        return redirect()->route('users.idiomas.index')->with('success', 'Idioma creado con éxito!');
    }


    public function edit(Idioma $idioma)
    {
        // Obtener los archivos relacionados con el idioma específico del usuario actual
        $archivos = Archivo::where('user_id', auth()->id())
            ->where('idioma_id', $idioma->id)
            ->get();

        return view('users.idiomas.edit', compact('idioma', 'archivos'));
    }


    public function show($idioma)
    {
        $archivo = Archivo::findOrFail($idioma);
        $decodedFile = base64_decode($archivo->ruta_base64);

        return response($decodedFile)
            ->header('Content-Type', 'image/jpeg'); // Ajusta el tipo MIME según el archivo
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
        ]);

        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $file) {
                $path = $file->store('archivos');

                Archivo::create([
                    'user_id' => auth()->id(),
                    'idioma_id' => $idioma->id,
                    'nombre_archivo' => $file->getClientOriginalName(),
                    'ruta' => $path,
                    'tipo_archivo' => $file->getMimeType()
                ]);
            }
        }

        return redirect()->route('users.idiomas.index')->with('success', 'Idioma actualizado con éxito!');
    }


    /* public function destroyImage(Idioma $idioma)
    {
        $archivo = Archivo::findOrFail($idioma);

        // Si no existe la sucursal, se envíe un mensaje de error.
        if (!$archivo) {
            return redirect()->back()->with('error', 'Imagen no encontrada.');
        }

        //le paso el nombre de la imagen con su extensión. Ejemplo: imagen.jpg y esto se lo paso a la variable $filename
        $filename = $archivo->ruta->id;

        //obtenemos la ruta completa ejemplo: public/sucursales/imagen.jpg
        $path = public_path('archivos/' . $filename);

        // Verifica si el archivo existe y elimínalo
        if (File::exists($path)) {
            #File::delete($path);
            Storage::delete($path);
            #Storage::delete($archivo->ruta);
        }

        return redirect()->back()->with('success', 'Imagen eliminada con éxito.');

        #Storage::delete($archivo->ruta);
        #$archivo->delete();

        #return redirect()->back()->with('success', 'Imagen eliminada.');
    } */

    public function destroyImage($id)
    {
        $archivo = Archivo::findOrFail($id);

        // Eliminar la imagen del sistema de archivos
        if (Storage::exists($archivo->ruta)) {
            Storage::delete($archivo->ruta);
        }

        // Eliminar el registro de la base de datos
        $archivo->delete();

        return response()->json(['success' => 'Imagen eliminada con éxito']);
    }

    public function destroy(Idioma $idioma)
    {
        $archivos = Archivo::where('idioma_id', $idioma->id)->get();

        foreach ($archivos as $archivo) {
            Storage::delete($archivo->ruta);
            $archivo->delete();
        }

        $idioma->delete();

        return redirect()->route('users.idiomas.index')->with('success', 'Idioma eliminado.');
    }
}
