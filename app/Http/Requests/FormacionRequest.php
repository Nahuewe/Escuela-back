<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormacionRequest extends FormRequest
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
            'formacion_id' => 'nullable|integer',
            'fecha_cursado' => 'nullable|date',
            'fecha_finalizacion' => 'nullable|date',
            'observaciones' => 'nullable|string|max:255',
            'persona_id' => 'required|exists:persona,id',
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
            'observaciones.string' => 'El campo observaciones debe ser una cadena de texto.',
            'observaciones.max' => 'El campo observaciones no puede tener más de 255 caracteres.',
            'persona_id.required' => 'El campo persona es obligatorio.',
            'persona_id.exists' => 'La persona seleccionada no es válida.',
        ];
    }
}
