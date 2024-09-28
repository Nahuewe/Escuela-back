<?php

namespace App\Services;
use App\Models\Formacion;

class FormacionService
{
    public function FormacionLista()
    {
        $Formacion = Formacion::all();
        return $Formacion;
    }
}
