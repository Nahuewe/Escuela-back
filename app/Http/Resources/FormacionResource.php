<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormacionResource extends JsonResource
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
            'formacion_id' => $this->resource->id ?? null,
            'formacion' => $this->resource->formacion->formacion ?? null,
            'fecha_cursado' => $this->resource->fecha_cursado ?? null,
            'persona_id' => $this->resource->persona_id ?? null,
        ];
    }
}
