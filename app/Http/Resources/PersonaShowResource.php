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
                'fecha_afiliacion' => $this->fecha_afiliacion ?? null,
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'sexo_id' => $this->sexo_id ?? null,
                'sexo' => $this->sexo->nombre ?? null,
                'fecha_nacimiento' => $this->fecha_nacimiento ?? null,
                'dni' => $this->dni,
                'telefono' => $this->telefono ?? null,
                'estados_id' => $this->estados_id ?? null,
                'estados' => $this->estados->nombre ?? null,
                'users_id' => $this->users_id ?? null,
                'user_nombre' => $this->users->nombre ?? null,
            ],
        ];
    }
}
