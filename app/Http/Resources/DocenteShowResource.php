<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocenteShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'nombre' => $this->resource->nombre,
            'dni' => $this->resource->dni,
            'fecha_nacimiento' => $this->fecha_nacimiento ?? null,
            'domicilio' => $this->resource->domicilio,
            'fecha_docencia' => $this->fecha_docencia ?? null,
            'fecha_cargo' => $this->fecha_cargo ?? null,
            'situacion' => $this->situacion,
            'formacion' => $this->resource->formacion,
            'telefono' => $this->resource->telefono,
            'observacion' => $this->resource->observacion,
        ];
    }
}
