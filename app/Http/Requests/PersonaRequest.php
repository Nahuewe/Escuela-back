<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cambia esto a true para permitir la solicitud.
        // Puedes agregar lógica de autorización aquí si es necesario.
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
            //PERSONA
            'persona.nombre' => 'required|string',
            'persona.apellido' => 'required|string',
            'persona.dni' => 'required|string|unique:persona',
            'persona.fecha_nacimiento' => 'nullable|date',
            'persona.edad' => 'nullable|string',
            'persona.sexo_id' => 'nullable|exists:sexo,id',
            'persona.telefono' => 'nullable|string',
            'persona.domicilio' => 'nullable|string',
            'persona.ocupacion' => 'nullable|string',
            'persona.enfermedad' => 'nullable|string',
            'persona.becas' => 'nullable|string',
            'persona.observacion' => 'nullable|string',

            //FORMACION
            'formacion' => 'array',
            'formacion.*.formacion_id' => 'nullable|integer|exists:docente,id',
            'formacion.*.fecha_cursado' => 'nullable|date',
            'formacion.*.fecha_finalizacion' => 'nullable|date|after_or_equal:formacion.*.fecha_cursado',
            'formacion.*.observaciones' => 'nullable|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            // PERSONA
            'persona.fecha_afiliacion.date' => 'La fecha de afiliación debe ser una fecha válida.',
            'persona.nombre.required' => 'El nombre es obligatorio.',
            'persona.apellido.required' => 'El apellido es obligatorio.',
            'persona.sexo_id.exists' => 'El sexo seleccionado no es válido.',
            'persona.fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'persona.dni.required' => 'El DNI es obligatorio.',
            'persona.dni.integer' => 'El DNI debe ser un número entero.',
            'persona.dni.unique' => 'El DNI ya está registrado.',
            'persona.telefono.string' => 'El teléfono debe ser un número entero.',
            'persona.estados_id.required' => 'El estado es obligatorio.',
            'persona.estados_id.exists' => 'El estado seleccionado no es válido.',
        ];
    }
}
