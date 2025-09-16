<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublicacion extends FormRequest
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
            'id_publicacion' => 'required|exists:tp_publicacion,idpublicacion',
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'isbn' => 'nullable|string',
            'editorial' => 'string|max:255',
            'entidad_financiera' => 'string|max:255',
            /* 'ruta' => 'required|file|max:5120', */ // Máximo 5MB
        ];
    }

    public function messages(): array
    {
        return [
            'id_publicacion.required' => 'El tipo de publicación es obligatorio.',
            'id_publicacion.exists' => 'El tipo de publicación seleccionado no es válido.',
            'titulo.required' => "El nombre de la publicación es requerido",
            'titulo.string' => 'El nombre de la publicación debe ser una cadena de caracteres.',
            'titulo.max' => "El nombre de la publicación excede la longitud máxima permitida.",
            'fecha.required' => "La fecha de publicación es requerida",
            'fecha.date' => "La fecha de publicación debe ser una fecha válida",
            'isbn.string' => 'El isbn debe ser una cadena de caracteres.',
            'editorial.string' => 'El editorial debe ser una cadena de caracteres.',
            'editorial.max' => "El editorial excede la longitud máxima permitida.",
            'entidad_financiera.string' => 'La entidad financiera debe ser una cadena de caracteres.',
            'entidad_financiera.max' => "La entidad financiera excede la longitud máxima permitida.",
/*             'ruta.required' => 'El archivo es requerido.',
            'ruta.file' => 'El archivo debe ser de tipo archivo.',
            'ruta.max' => 'El tamaño del archivo no puede ser mayor a :max kilobytes.', */
        ];
    }

    public function attributes(): array
    {
        return [
            'id_publicacion' => 'tipo de publicación',
            'titulo' => 'título de la publicación',
            'fecha' => 'fecha de publicación',
            'isbn' => 'isbn',
            'editorial' => 'editorial',
            'entidad_financiera' => 'entidad financiera',
            /* 'ruta' => 'ruta' */
        ];        
    }
}