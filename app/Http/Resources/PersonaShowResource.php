<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PersonaShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'persona' => [
                'id' => $this->id,
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'dni' => $this->dni,
                'fecha_nacimiento' => $this->fecha_nacimiento ?? null,
                'fecha_cursado' => $this->fecha_cursado ?? null,
                'edad' => $this->edad,
                'sexo_id' => $this->sexo_id ?? null,
                'sexo' => $this->sexo->nombre ?? null,
                'telefono' => $this->telefono,
                'domicilio' => $this->domicilio,
                'ocupacion' => $this->ocupacion,
                'enfermedad' => $this->enfermedad,
                'becas' => $this->becas,
                'formacion_id' => $this->formacion->id ?? null,
                'formacion' => $this->formacion->formacion ?? null,
                'observacion' => $this->observacion,
                'estados_id' => $this->estados_id ?? null,
                'estados' => $this->estados->nombre ?? null,
            ],
        ];
    }
}
