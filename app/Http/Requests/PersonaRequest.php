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
            'persona.legajo' => 'required|string|unique:persona',
            'persona.fecha_afiliacion' => 'nullable|date',
            'persona.nombre' => 'required|string',
            'persona.apellido' => 'required|string',
            'persona.sexo_id' => 'nullable|exists:sexo,id',
            'persona.fecha_nacimiento' => 'nullable|date',
            'persona.dni' => 'required|string|unique:persona',
            'persona.cuil' => 'nullable|string|unique:persona',
            'persona.email' => 'nullable|string',
            'persona.telefono' => 'nullable|string',
            'persona.nacionalidad_id' => 'nullable|exists:nacionalidad,id',
            'persona.users_id'=>'required|integer',

            //DOCUMENTACION
            // 'documentacion' => 'array',
            // 'documentacion.*.id'=>'nullable|integer'

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
            'persona.legajo.required' => 'El legajo es obligatorio.',
            'persona.legajo.unique' => 'El legajo ya está registrado.',
            'persona.fecha_afiliacion.date' => 'La fecha de afiliación debe ser una fecha válida.',
            'persona.nombre.required' => 'El nombre es obligatorio.',
            'persona.apellido.required' => 'El apellido es obligatorio.',
            'persona.sexo_id.exists' => 'El sexo seleccionado no es válido.',
            'persona.fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'persona.dni.required' => 'El DNI es obligatorio.',
            'persona.dni.integer' => 'El DNI debe ser un número entero.',
            'persona.dni.unique' => 'El DNI ya está registrado.',
            'persona.cuil.integer' => 'El CUIL debe ser un número entero.',
            'persona.cuil.unique' => 'El CUIL ya está registrado.',
            'persona.email.email' => 'El correo electrónico debe ser una dirección válida.',
            'persona.email.unique' => 'El correo electrónico ya está registrado.',
            'persona.telefono.string' => 'El teléfono debe ser un número entero.',
            'persona.nacionalidad_id.exists' => 'La nacionalidad seleccionada no es válida.',
            'persona.estados_id.required' => 'El estado es obligatorio.',
            'persona.estados_id.exists' => 'El estado seleccionado no es válido.',
        ];
    }
}
