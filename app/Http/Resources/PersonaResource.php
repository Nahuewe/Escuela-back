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
            'estado'=>$this->resource->estados->nombre,
        ];
    }
}
