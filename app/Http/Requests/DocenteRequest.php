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
            'nombre' => 'required|string|max:255',
            'formacion' => 'nullable|string|max:255',
            'telefono_laboral' => 'nullable|string|max:255',
        ];
    }
}
