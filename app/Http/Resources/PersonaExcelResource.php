<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PersonaExcelResource extends JsonResource
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
                'id' => $this->id ?? null,
                'nombre' => $this->nombre ?? null,
                'apellido' => $this->apellido ?? null,
                'dni' => $this->dni ?? null,
                'fecha_nacimiento' => $this->fecha_nacimiento ?? null,
                'edad' => $this->edad ?? null,
                'sexo_id' => $this->sexo_id ?? null,
                'sexo' => $this->sexo->nombre ?? null,
                'telefono' => $this->telefono ?? null,
                'domicilio' => $this->domicilio ?? null,
                'ocupacion' => $this->ocupacion ?? null,
                'enfermedad' => $this->enfermedad ?? null,
                'becas' => $this->becas ?? null,
                'observacion' => $this->observacion ?? null,
                'estados_id' => $this->estados_id ?? null,
                'estados' => $this->estados->nombre ?? null,
            ],
            'formacion' => $this->when($this->formacion, function () {
                return $this->formacion->map(function ($for) {
                    return [
                        'id' => $for->id ?? null,
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
