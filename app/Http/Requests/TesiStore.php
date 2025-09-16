<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TesiStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_area_investigacion' => 'required|exists:areas_investigacion,id_areainv',
            'id_grado_academico' => 'required|exists:grado_academico,idgradoacademico',
            'id_facultad' => 'required|exists:facultades,idfacultad',
            'titulo' => 'required|string|max:255',
            'fecha_sustentacion' => 'required|date',
            'pais' => 'nullable|string',
            'publicacion_revista' => 'nullable|in:No,Si',
            'financiacion_externa' => 'nullable|in:No,Si',
            //'ruta' => 'required|file|mimes:pdf,image/*|max:5120', // Si deseas validar el tipo de archivo y su tamaño
        ];
    }

    public function messages(): array
    {
        return [
            'id_area_investigacion.required' => 'El area investigación es requerida.',
            'id_area_investigacion.exists' => 'El area investigación seleccionada no es válida.',

            'id_grado_academico.required' => 'El grado académico es requerida.',
            'id_grado_academico.exists' => 'El grado académico seleccionado no es válido.',

            'id_facultad.required' => 'La Facultad es requerida.',
            'id_facultad.exists' => 'La Facultad seleccionada no es válida.',

            'titulo.required' => 'El título es requerido.',
            'titulo.string' => 'El título debe ser una cadena de caracteres.',
            'titulo.max' => 'El título no puede tener más de :max caracteres.',
            'fecha_sustentacion.required' => 'La Fecha de sustentación es requerida.',
            'fecha_sustentacion.date' => 'La fecha de sustentación debe ser una fecha válida.',
            'pais.string' => 'El pais debe ser una cadena de caracteres.',
            'publicacion_revista.in' => 'El campo de publicación en revista debe ser "Si" o "No".',
            'financiacion_externa.in' => 'El campo de financiación externa debe ser "Si" o "No".',
            //'ruta.required' => 'El archivo es requerido.',
            //'ruta.file' => 'El archivo debe ser de tipo archivo.',
            //'ruta.mimes' => 'El archivo debe ser de tipo PDF o imagen.',
            //'ruta.max' => 'El tamaño del archivo no puede ser mayor a :max kilobytes.',
        ];
    }

    public function attributes(): array
    {
        return [
            'id_area_investigacion' => 'area de investigación',
            'id_grado_academico' => 'grado académico',
            'id_facultad' => 'facultad',
            'titulo' => 'título',
            'fecha_sustentacion' => 'fecha de sustentación',
            'pais' => 'país',
            'publicacion_revista' => 'publicación en revista',
            'financiacion_externa' => 'financiación externa',
            //'ruta' => 'archivo',
        ];
    }
}
