<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartConstante extends FormRequest
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
            'centro_estudio' => 'required',
            'modalidad' => 'required|in:Presencial,Virtual,Semi-presencial',
            'pais' => 'required|string|max:255',
            'estatus_prepconstante' => 'required|in:Cursando Actualmente,Completo',
            'duracion' => 'required',
            'ano_titulo' => 'nullable|date_format:Y',
            /* 'ruta' => 'required|file|max:5120', */ // Máximo 5MB
        ];
    }

    //por cada validacion de cada campo se debe crear un mensaje
    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es requerido.',
            'titulo.string' => 'El título debe ser una cadena de caracteres.',
            'titulo.max' => 'El título no puede tener más de :max caracteres.',
            'centro_estudio.required' => 'El centro de estudio es requerido.',
            'modalidad.required' => 'La modalidad de estudio es requerida.',
            'modalidad.in' => 'La modalidad de estudio seleccionada no es válida.',
            'pais.required' => 'El país es requerido.',
            'pais.string' => 'El pais debe ser una cadena de caracteres.',
            'estatus_prepconstante.required' => 'El estatus de la preparación constante es requerido.',
            'estatus_prepconstante.in' => 'El estatus de la preparación constante seleccionado no es válido.',
            'duracion.required' => 'La duración es requerida.',
            'ano_titulo.date_format' => 'El año del título debe tener el formato YYYY.',
 /*            'ruta.required' => 'El archivo es requerido.',
            'ruta.file' => 'El archivo debe ser de tipo archivo.',
            'ruta.max' => 'El tamaño del archivo no puede ser mayor a :max kilobytes.', */
        ];
    }

    public function attributes(): array
    {
        return [
            'titulo' => 'título',
            'centro_estudio' => 'centro de estudio',
            'modalidad' => 'modalidad de estudio',
            'pais' => 'país',
            'estatus_prepconstante' => 'estatus de la preparación constante',
            'duracion' => 'duración',
            'ano_titulo' => 'año del título',
            /* 'ruta' => 'archivo', */
        ];
    }
}
