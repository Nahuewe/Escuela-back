<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'nombre'=>$this->resource->nombre,
            'apellido'=>$this->resource->apellido,
            'dni'=>$this->resource->dni,
            // 'fecha_nacimiento'=>$this->resource->fecha_nacimiento,
            // 'edad'=>$this->resource->edad,
            'telefono'=>$this->resource->telefono,
            // 'domicilio'=>$this->resource->domicilio,
            'ocupacion'=>$this->resource->ocupacion,
            // 'enfermedad'=>$this->resource->enfermedad,
            // 'becas'=>$this->resource->becas,
            'formacion_id' => $this->resource->id ?? null,
            'formacion' => FormacionResource::collection($this->whenLoaded('formacion')),
            // 'observacion'=>$this->resource->observacion,
            'estado'=>$this->resource->estados->nombre,
        ];
    }
}
