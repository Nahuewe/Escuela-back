<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $resource = $this->resource;
        return [
            'id' => $resource['id'] ?? null,
            'nombre' => ($resource['nombre'] ?? null),
            'apellido' => ($resource['apellido'] ?? null),
            'dni' => ($resource['dni'] ?? null),
            // 'fecha_nacimiento'=>$this->resource->fecha_nacimiento,
            // 'edad'=>$this->resource->edad,
            'telefono' => ($resource['telefono'] ?? null),
            // 'domicilio'=>$this->resource->domicilio,
            'ocupacion' => ($resource['ocupacion'] ?? null),
            // 'enfermedad'=>$this->resource->enfermedad,
            // 'becas'=>$this->resource->becas,
            'formacion_id' => $this->resource->id ?? null,
            'formacion' => FormacionResource::collection($this->whenLoaded('formacion')),
            // 'observacion'=>$this->resource->observacion,
            'estado' => is_array($resource) ? ($resource['estado'] ?? null) : $resource->estados->nombre ?? null,
        ];
    }
}