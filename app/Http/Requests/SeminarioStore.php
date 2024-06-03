<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeminarioStore extends FormRequest
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
            'id_tipo_participacion' => 'required|exists:tipo_participaciones,idparticipaciones',
            'titulo' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'facilitador' => 'nullable|string|max:255',
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date',
            'pais' => 'required|string|max:255',
            'modalidad' => 'required|in:Presencial,Virtual,Semi-presencial',
            'lugar' => 'required|string|max:255',
            'horas' => 'required|integer',
            /* 'ruta' => '' */
        ];
    }

    public function messages(): array
    {
        return [
            'id_tipo_participacion.required' => 'El tipo de participación es obligatorio.',
            'id_tipo_participacion.exists' => 'El tipo de participación seleccionado no es válido.',
            
            'titulo.required' => 'El título es requerido.',
            'titulo.string' => 'El título debe ser una cadena de caracteres.',
            'titulo.max' => 'El título no puede tener más de :max caracteres.',

            'institucion.required' => 'El nombre de la institución es requerido.',
            'institucion.string' => 'El nombre de la institución debe ser una cadena de caracteres.',
            'institucion.max' => 'El nombre de la institución no puede tener más de :max caracteres.',

            'facilitador.required' => 'El nombre del facilitador es requerido.',
            'facilitador.string' => 'El nombre del facilitador debe ser una cadena de caracteres.',
            'facilitador.max' => 'El nombre del facilitador no puede tener más de :max caracteres.',
            
            'fecha_ini.required' => 'La fecha de inicio es obligatoria.',
            'fecha_ini.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',

            'pais.required' => 'El país es requerido.',
            'pais.string' => 'El país debe ser una cadena de caracteres.',
            'pais.max' => 'El país no puede tener más de :max caracteres.',

            'modalidad.required' => 'La modalidad es obligatoria.',
            'modalidad.in' => 'La modalidad seleccionada no es válida.',

            'lugar.required' => 'El lugar es requerido.',
            'lugar.string' => 'El lugar debe ser una cadena de caracteres.',
            'lugar.max' => 'El lugar no puede tener más de :max caracteres.',

            'horas.required' => 'Las horas son requeridas.',
            'horas.integer' => 'Las horas debe ser un número entero.',
        ];
    }

    public function attributes(): array
    {
        return [
            'id_tipo_participacion' => 'tipo de participación',
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
