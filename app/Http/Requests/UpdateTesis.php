<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTesis extends FormRequest
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
            'titulo' => 'required|string|max:255',
            'fecha_sustentacion' => 'nullable|date',
            'pais' => 'nullable|string',
            'publicacion_revista' => 'nullable|in:No,Si',
            'financiacion_externa' => 'nullable|in:No,Si',
            //'ruta' => 'required|file|mimes:pdf,image/*|max:5120', // Si deseas validar el tipo de archivo y su tamaño
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es requerido.',
            'titulo.max' => 'El título no puede tener más de :max caracteres.',
            'fecha_sustentacion.date' => 'La fecha de sustentación debe ser una fecha válida.',
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
            'titulo' => 'título',
            'fecha_sustentacion' => 'fecha de sustentación',
            'pais' => 'país',
            'publicacion_revista' => 'publicación en revista',
            'financiacion_externa' => 'financiación externa',
            //'ruta' => 'archivo',
        ];
    }
}
