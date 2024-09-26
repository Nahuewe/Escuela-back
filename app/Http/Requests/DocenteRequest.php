<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteRequest extends FormRequest
{
    public function authorize()
    {
        return true;  // Cambiar según la lógica de autorización
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string',
            'dni' => 'required|string|unique:persona',
            'fecha_nacimiento' => 'nullable|date',
            'domicilio' => 'nullable|string',
            'fecha_docencia' => 'nullable|date',
            'fecha_cargo' => 'nullable|date',
            'situacion' => 'nullable|string',
            'formacion' => 'nullable|string',
            'telefono' => 'nullable|string',
        ];
    }
}
