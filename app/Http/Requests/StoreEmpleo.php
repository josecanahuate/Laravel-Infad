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
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'date|after_or_equal:fecha_inicio',
            'pais' => 'required|string',
            /* 'estatus' => 'required|string|in:pendiente,aprobado,rechazado', */
        ];
    }

    //por cada validacion de cada campo se debe crear un mensaje
    public function messages(): array
    {
        return [
            'empresa.required' => "El nombre de la empresa es requerido",
            'empresa.max' => "El nombre de la empresa es muy largo",
            'cargo.required' => "El cargo es requerido",
            'cargo.string' => "el campo cargo solo puede contener letras",
            'fecha_inicio.required' => "La fecha de inicio es requerida",
            'fecha_inicio.date' => "la fecha de inicio debe ser de tipo fecha",
            'fecha_fin.date' => "la fecha de fin debe ser de tipo fecha",
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior a la fecha actual',
            'pais.required' => "El pais es requerido",
            'pais.string' => "el campo pais solo puede contener letras",
            /* 'estatus.in' => "Status must be 'pending', 'accepted' or 'rejected'", */
        ];
    }

    public function attributes(): array
    {
        return [
            'empresa' => 'empresa',
            'cargo' => 'cargo',
            'fecha_inicio' => 'fecha de inicio',
            'fecha_fin' => 'fecha de fin',
            'pais' => 'pais',
            'estatus' => 'estatus'
        ];
    }

}
