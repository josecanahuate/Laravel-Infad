<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartConstanteStore extends FormRequest
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
        //COLOCAR LOS CAMPOS QUE VAN
        return [
            'titulo' => 'required|string|max:255',
            'centro_estudio' => 'required',
            'modalidad' => 'required|in:Presencial,Virtual,Semi-presencial',
            'pais' => 'required|string|max:255',
            'estatus_prepconstante' => 'required|in:Cursando Actualmente,Completo',
            'duracion' => 'required',
            'ano_titulo' => 'nullable',            
        ];
    }

    //por cada validacion de cada campo se debe crear un mensaje
    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.string' => 'El título debe ser una cadena de caracteres.',
            'titulo.max' => 'El título no puede exceder los 255 caracteres.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_inicio.date_format' => 'La fecha de inicio debe estar en el formato año-mes-día (YYYY-MM-DD).',
            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',
            'fecha_fin.date_format' => 'La fecha de fin debe estar en el formato año-mes-día (YYYY-MM-DD).',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'lugar_congreso.required' => 'El lugar del congreso es obligatorio.',
            'lugar_congreso.string' => 'El lugar del congreso debe ser una cadena de caracteres.',
            'lugar_congreso.max' => 'El lugar del congreso no puede exceder los 255 caracteres.',
            'pais.string' => 'El país debe ser una cadena de caracteres.',
            'pais.max' => 'El país no puede exceder los 255 caracteres.',
            'publicacion_proceeding.required' => 'El estado de publicación en proceedings es obligatorio.',
            'publicacion_proceeding.in' => 'El estado de publicación en proceedings seleccionado no es válido.',
            'tipo_participaciones.required' => 'El tipo de participación es obligatorio.',
            'tipo_participaciones.in' => 'El tipo de participación seleccionado no es válido.'
        ];
    }

    public function attributes(): array
    {
        return [
            'titulo' => 'Título',
            'fecha_inicio' => 'Fecha de inicio',
            'fecha_fin' => 'Fecha de fin',
            'lugar_congreso' => 'Lugar del congreso',
            'pais' => 'País',
            'publicacion_proceeding' => 'Publicación en Proceedings',
            'tipo_participaciones' => 'Tipo de participación'
        ];        
    }
}