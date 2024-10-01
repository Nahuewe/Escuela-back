<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocenteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'dni' => $this->dni,
            'fecha_nacimiento' => $this->fecha_nacimiento ?? null,
            'domicilio' => $this->domicilio,
            'fecha_docencia' => $this->fecha_docencia ?? null,
            'fecha_cargo' => $this->fecha_cargo ?? null,
            'situacion' => $this->situacion,
            'formacion' => $this->formacion,
            'telefono' => $this->telefono,
            'observacion' => $this->observacion,
        ];
    }
}

