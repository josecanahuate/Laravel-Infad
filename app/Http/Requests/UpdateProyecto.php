<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProyecto extends FormRequest
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
            'titulo_investigacion' => 'required|string|max:255',
            'sector_pertenece' => 'required',
            'id_area_investigacion' => 'required|exists:areas_investigacion,id_areainv',
            'id_facultad' => 'required|exists:facultades,idfacultad',
            'id_sede' => 'required|exists:sedes,idsede',
            'id_programa_adscribe' => 'required|exists:programa_adscribe,idadscribe',
            'id_linea_investigacion' => 'required|exists:lineas_investigacion,id_linea',
            'periodo_vigencia_ini' => 'nullable|date|date_format:Y-m-d',
            'periodo_vigencia_fin' => 'nullable|date|date_format:Y-m-d|after_or_equal:periodo_vigencia_ini',
            'estado_actual' => 'required|in:En Progreso,Completado,Pendiente de Aprobación,Aprobado',
            'entidad_financiera' => 'nullable|string|max:255',
            'monto_asignado' => 'nullable|numeric|min:0',
            'sitio_web' => 'nullable|url|max:255',
            'enlace_video' => 'nullable|url|max:255'
        ];
        
    }

    public function messages(): array
    {
        return [
            'titulo_investigacion.required' => 'El título de la investigación es requerido.',
            'titulo_investigacion.string' => 'El título de la investigación debe ser una cadena de texto.',
            'titulo_investigacion.max' => 'El título de la investigación no debe exceder los 255 caracteres.',
            
            'sector_pertenece.required' => 'El sector al que pertenece es requerido.',
            
            'id_area_investigacion.required' => 'El área de investigación es requerida.',
            'id_area_investigacion.exists' => 'El área de investigación seleccionada no es válida.',
            
            'id_facultad.required' => 'La Facultad es requerida.',
            'id_facultad.exists' => 'La Facultad seleccionada no es válida.',
            
            'id_sede.required' => 'La Sede es requerida.',
            'id_sede.exists' => 'La Sede seleccionada no es válida.',
            
            'id_programa_adscribe.required' => 'El programa al que se adscribe es requerido.',
            'id_programa_adscribe.exists' => 'El programa al que se adscribe seleccionado no es válido.',
            
            'id_linea_investigacion.required' => 'La línea de investigación es requerida.',
            'id_linea_investigacion.string' => 'La línea de investigación debe ser una cadena de texto.',
            'id_linea_investigacion.max' => 'La línea de investigación no debe exceder los 255 caracteres.',
                        
            'periodo_vigencia_ini.date' => 'El periodo de vigencia inicial debe ser una fecha válida.',
            'periodo_vigencia_ini.date_format' => 'El periodo de vigencia inicial debe estar en el formato año-mes-día (YYYY-MM-DD).',
            'periodo_vigencia_fin.date' => 'El periodo de vigencia final debe ser una fecha válida.',
            'periodo_vigencia_fin.date_format' => 'El periodo de vigencia final debe estar en el formato año-mes-día (YYYY-MM-DD).',
            'periodo_vigencia_fin.after_or_equal' => 'El periodo de vigencia final debe ser igual o posterior al periodo de vigencia inicial.',


            'estado_actual.required' => 'El estado actual es requerido.',
            'estado_actual.in' => 'El estado actual debe ser "Cursando Actualmente" o "Completo".',
            
            'entidad_financiera.string' => 'La entidad financiera debe ser una cadena de texto.',
            'entidad_financiera.max' => 'La entidad financiera no debe exceder los 255 caracteres.',
            
            'monto_asignado.numeric' => 'El monto asignado debe ser un número.',
            'monto_asignado.min' => 'El monto asignado no puede ser negativo.',
            
            'sitio_web.url' => 'El sitio web debe ser una URL válida.',
            'sitio_web.max' => 'El sitio web no debe exceder los 255 caracteres.',
            
            'enlace_video.url' => 'El enlace del video debe ser una URL válida.',
            'enlace_video.max' => 'El enlace del video no debe exceder los 255 caracteres.',
        ];
    }

    public function attributes(): array
    {
        return [
            'titulo_investigacion' => 'título de la investigación',
            'sector_pertenece' => 'sector al que pertenece',
            'id_area_investigacion' => 'área de investigación',
            'id_facultad' => 'Facultad',
            'id_sede' => 'Sede',
            'id_programa_adscribe' => 'programa al que se adscribe',
            'id_linea_investigacion' => 'línea de investigación',
            'periodo_vigencia_ini' => 'periodo de vigencia inicial',
            'periodo_vigencia_fin' => 'periodo de vigencia final',
            'estado_actual' => 'estado actual',
            'entidad_financiera' => 'entidad financiera',
            'monto_asignado' => 'monto asignado',
            'sitio_web' => 'sitio web',
            'enlace_video' => 'enlace del video',
        ];
    }
}
