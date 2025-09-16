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
            //'estatus_prepformal' => 'required',
            //'ano_titulo' => 'nullable|date_format:Y',
            'titulo' => 'required|string|max:255',
            'fecha_inicio' => 'required|date|date_format:Y-m-d',
            'fecha_fin' => 'required|date|date_format:Y-m-d|after_or_equal:fecha_inicio',
            'pais' => 'nullable|string',
            'tipo' => 'required|in:Nacional,Extranjero',
            'modalidad' => 'required|in:Presencial,Virtual,Semi-presencial',
            'institucion_superior' => 'required|string|max:255',
            'financiamiento' => 'required|in:Recursos Propios,Beca,Financiamiento',
            'monto_asignado' => 'nullable|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'id_grado_academico.required' => 'El grado académico es obligatorio.',
            'id_grado_academico.exists' => 'El grado académico seleccionado no es válido.',
            //'estatus_prepformal.required' => 'El estatus de la preparación formal es requerido.',
            //'ano_titulo.date_format' => 'El año del título debe tener el formato YYYY.',
            'titulo.required' => 'El título es requerido.',
            'titulo.max' => 'El título no puede tener más de 255 caracteres.',
            'titulo.string' => 'El título debe ser una cadena de caracteres.',

            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_inicio.date_format' => 'La fecha de inicio debe estar en el formato año-mes-día (YYYY-MM-DD).',

            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',
            'fecha_fin.date_format' => 'La fecha de fin debe estar en el formato año-mes-día (YYYY-MM-DD).',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            
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
            'monto_asignado' => 'El Monto asignado debe ser de tipo entero.',
            // 'ruta' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ];
    }

    public function attributes(): array
    {
        return [
            'id_grado_academico' => 'grado académico',
            //'estatus_prepformal' => 'estatus de la preparación formal',
            //'ano_titulo' => 'año del título',
            'titulo' => 'título',
            'fecha_inicio' => 'fecha de inicio',
            'fecha_fin' => 'fecha de fin',
            'pais' => 'país',
            'tipo' => 'tipo de preparación',
            'modalidad' => 'modalidad de estudio',
            'institucion_superior' => 'institución superior',
            'financiamiento' => 'financiamiento',
            'monto_asignado' => 'monto asignado'
        ];
    }

}
