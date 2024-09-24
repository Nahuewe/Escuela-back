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
            'persona.fecha_afiliacion' => 'nullable|date',
            'persona.nombre' => 'required|string',
            'persona.apellido' => 'required|string',
            'persona.sexo_id' => 'nullable|exists:sexo,id',
            'persona.fecha_nacimiento' => 'nullable|date',
            'persona.dni' => [
                'required',
                'string',
                Rule::unique('persona')->ignore($id)
            ],
            'persona.cuil' => [
                'nullable',
                'string',
                Rule::unique('persona')->ignore($id)
            ],
            'persona.email' => 'nullable|string',
            'persona.telefono' => 'nullable|string',
            'persona.nacionalidad_id' => 'nullable|exists:nacionalidad,id',
            'persona.estados_id' => 'exists:estados,id',
            'users_id'=>'required|integer',

              //DOCUMENTACION
            // 'documentacion' => 'array',
            // 'documentacion.*.id'=>'nullable|integer'
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages()
    {
        return [
            'persona.dni.unique' => 'El DNI ya está registrado.',
            'persona.cuil.unique' => 'El CUIL ya está registrado.',
        ];
    }
}
