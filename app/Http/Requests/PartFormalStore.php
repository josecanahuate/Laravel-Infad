<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartFormalStore extends FormRequest
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
            'id_grado_academico' => 'required|exists:grado_academico,idgradoacademico',
            'estatus_prepformal' => 'required',
            'titulo' => 'required|string|max:255',
            'ano_titulo' => 'nullable|date_format:Y',
            'pais' => 'nullable|string',
            'tipo' => 'required|in:Nacional,Extranjero',
            'modalidad' => 'required|in:Presencial,Virtual,Semi-presencial',
            'institucion_superior' => 'required|string|max:255',
            'financiamiento' => 'required|in:Recursos Propios,Beca,Financiamiento',
        ];
    }

    public function messages(): array
    {
        return [
            'id_grado_academico.required' => 'El grado académico es obligatorio.',
            'id_grado_academico.exists' => 'El grado académico seleccionado no es válido.',
            'estatus_prepformal.required' => 'El estatus de la preparación formal es requerido.',
            'titulo.required' => 'El título es requerido.',
            'titulo.max' => 'El título no puede tener más de 255 caracteres.',
            'titulo.string' => 'El título debe ser una cadena de caracteres.',
            'ano_titulo.date_format' => 'El año del título debe tener el formato YYYY.',
            'pais.string' => 'El pais debe ser una cadena de caracteres.',
            'tipo.required' => 'El tipo de preparación es requerido.',
            'tipo.in' => 'El tipo de preparación seleccionado no es válido.',
            'modalidad.required' => 'La modalidad de estudio es requerida.',
            'modalidad.in' => 'La modalidad de estudio seleccionada no es válida.',
            'institucion_superior.required' => 'La institución superior es requerida.',
            'institucion_superior.string' => 'La institución superior debe ser una cadena de caracteres.',
            'institucion_superior.max' => 'La institución superior no puede tener más de :max caracteres.',
            'financiamiento.required' => 'El financiamiento es requerido.',
            'financiamiento.in' => 'El tipo de financiamiento seleccionado no es válido.',
            // 'ruta' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ];
    }

    public function attributes(): array
    {
        return [
            'id_grado_academico' => 'grado académico',
            'estatus_prepformal' => 'estatus de la preparación formal',
            'titulo' => 'título',
            'ano_titulo' => 'año del título',
            'pais' => 'país',
            'tipo' => 'tipo de preparación',
            'modalidad' => 'modalidad de estudio',
            'institucion_superior' => 'institución superior',
            'financiamiento' => 'financiamiento',
        ];
    }

}
