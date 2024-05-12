<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIdioma extends FormRequest
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
            'institucion' => 'required|string|max:255',
            'idioma' => 'required',
            'lee_nivel' => 'required',
            'escribe_nivel' => 'required',
            'habla_nivel' => 'required',
            'comprende_nivel' => 'required',
        ];
    }


    //por cada validacion de cada campo se debe crear un mensaje
    public function messages(): array
    {
        return [
            'institucion.required' => "El nombre de la institución es requerido",
            'institucion.max' => "El nombre de la institución excede la longitud máxima permitida.",
            'idioma.required' => "El idioma es requerido",
            'lee_nivel.required' => "El nivel de lectura es requerido",
            'escribe_nivel.required' => "El nivel de escritura es requerido",
            'habla_nivel.required' => "El nivel de habla es requerido",
            'comprende_nivel.required' => "El nivel de comprensión es requerido",
        ];
    }

    public function attributes(): array
    {
        return [
            'institucion' => 'Institución',
            'idioma' => 'Idioma',
            'lee_nivel' => 'Nivel de lectura',
            'escribe_nivel' => 'Nivel de escritura',
            'habla_nivel' => 'Nivel de habla',
            'comprende_nivel' => 'Nivel de comprensión'
        ];        
    }

}
