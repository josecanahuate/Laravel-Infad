<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleo extends FormRequest
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
            'empresa' => 'required|max:255',
            'cargo' => 'required|string',
            'estatus_empleo' => 'required|in:Concluido,Actualmente laborando',
            'sector_empresa' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'date|after_or_equal:fecha_inicio',
            'pais' => 'string',
        ];
    }

    public function messages(): array
    {
        return [
            'empresa.required' => "Se requiere especificar el nombre de la empresa.",
            'empresa.max' => "El nombre de la empresa excede la longitud máxima permitida.",
            'cargo.required' => "Es necesario especificar el cargo.",
            'cargo.string' => "El campo 'cargo' solo puede contener caracteres alfabéticos.",
            'estatus_empleo.required' => 'Se requiere especificar el estatus del empleo.',
            'estatus_empleo.in' => 'Se requiere especificar un valor permitido.',
            'sector_empresa.required' => 'Se requiere especificar el sector de la empresa.',
            'fecha_inicio.required' => "Se requiere proporcionar la fecha de inicio.",
            'fecha_inicio.date' => "La fecha de inicio debe ser de tipo fecha.",
            'fecha_fin.date' => "La fecha de fin debe ser de tipo fecha.",
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la fecha actual.',
            'pais.required' => "Se requiere especificar el país.",
            'pais.string' => "El campo 'país' solo puede contener caracteres alfabéticos.",
        ];
    }

    public function attributes(): array
    {
        return [
            'empresa' => 'Empresa',
            'cargo' => 'Cargo',
            'estatus_empleo' => 'Estatus de empleo',
            'sector_empresa' => 'Sector de la empresa',
            'fecha_inicio' => 'Fecha de inicio',
            'fecha_fin' => 'Fecha de fin',
            'pais' => 'País',
            'estatus' => 'Estatus'
        ];
        
    }

}
