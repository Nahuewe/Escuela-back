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
                'edad' => $this->edad,
                'sexo_id' => $this->sexo_id ?? null,
                'sexo' => $this->sexo->nombre ?? null,
                'telefono' => $this->telefono,
                'domicilio' => $this->domicilio,
                'ocupacion' => $this->ocupacion,
                'enfermedad' => $this->enfermedad,
                'becas' => $this->becas,
                'observacion' => $this->observacion,
                'estados_id' => $this->estados_id ?? null,
                'estados' => $this->estados->nombre ?? null,
            ],
            'formacion' => $this->when('formacion', function () {
                return $this->formacion->map(function ($for) {
                    return [
                        'id' => $for->id,
                        'formacion_id' => $for->formacion_id ?? null,
                        'formacion' => $for->formacion->formacion ?? null,
                        'fecha_cursado' => $for->fecha_cursado ?? null,
                        'fecha_finalizacion' => $for->fecha_finalizacion ?? null,
                        'observaciones' => $for->observaciones ?? null,
                    ];
                });
            }),
        ];
    }
}
