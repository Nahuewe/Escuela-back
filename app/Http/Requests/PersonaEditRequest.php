<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonaEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $id = $this->route('persona'); // Directamente obtener el ID de la ruta

        return [
            'persona.nombre' => 'required|string',
            'persona.apellido' => 'required|string',
            'persona.fecha_afiliacion' => 'nullable|date',
            'persona.sexo_id' => 'nullable|exists:sexo,id',
            'persona.fecha_nacimiento' => 'nullable|date',
            'persona.dni' => [
                'required',
                'string',
                Rule::unique('persona')->ignore($id)
            ],
            'persona.telefono' => 'nullable|string',
            'persona.estados_id' => 'exists:estados,id',
            'users_id'=>'required|integer',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages()
    {
        return [
            'persona.dni.unique' => 'El DNI ya está registrado.',
        ];
    }
}
