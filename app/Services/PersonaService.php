<?php

namespace App\Services;

use App\Models\Formacion;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonaService
{
    public function personaTabla()
    {
        $persona = Persona::orderBy('apellido', 'asc')->paginate(10);
        return $persona;
    }

    public function personaAll()
    {
        $persona=Persona::orderBy('apellido', 'asc')->get();
        return $persona;
    }

    public function verPersona($id)
    {
        return Persona::with('formacion')->findOrFail($id);
    }

    public function personaCrear($data)
    {
        DB::beginTransaction();

        try {

            $data['persona']['estados_id'] = 1;
            $persona = Persona::create($data['persona']);

            if (isset($data['formacion'])) {
                $this->crearFormacion($persona->id, $data['formacion']);
            }

            DB::commit();

            return $persona;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error al crear persona: ' . $e->getMessage());
            throw $e;
        }
    }

    public function crearFormacion($id, $data)
    {
        foreach ($data as $formacion) {
            $formacion['persona_id'] = $id;
            Formacion::create($formacion);
        }
    }

    public function personaActualizar($personaId, $data)
    {
        try {
            $persona = Persona::findOrFail($personaId);

            if (isset($data['formacion'])) {
                $this->actualizarFormacion($persona->id, $data['formacion']);
            } else {
                $this->eliminarFormacion($persona->id);
            }
    
            $persona->update($data['persona']);
    
            return $persona;
        } catch (\Exception $e) {
            Log::error('Error al actualizar persona: ' . $e->getMessage());
            throw $e;
        }
    }

    private function actualizarFormacion($personaId, $data)
    {
        $existingFormacion = Formacion::where('persona_id', $personaId)->get()->keyBy('id')->toArray();

        foreach ($data as $formacion) {
            if (isset($formacion['id'])) {
                if (isset($existingFormacion[$formacion['id']])) {
                    Formacion::where('id', $formacion['id'])->update($formacion);
                    unset($existingFormacion[$formacion['id']]);
                } else {
                    $formacion['persona_id'] = $personaId;
                    Formacion::create($formacion);
                }
            } else {
                $formacion['persona_id'] = $personaId;
                Formacion::create($formacion);
            }
        }

        foreach ($existingFormacion as $formacion) {
            Formacion::where('id', $formacion['id'])->delete();
        }
    }

    private function eliminarFormacion($personaId)
    {
        Formacion::where('persona_id', $personaId)->delete();
    }

    public function eliminarPersona($id)
    {
        $persona = Persona::findOrFail($id);

        // Alternar entre estados 1 y 2
        if ($persona->estados_id == 1) {
            $persona->estados_id = 2;
        } else {
            $persona->estados_id = 1;
        }

        $persona->save();
        return $persona;
    }

    public function personaLista()
    {
        $persona = Persona::with('formacion')->get();
        return $persona;
    }

    public function cambiarEstado($personaId, $estadoId)
    {
        $persona = Persona::findOrFail($personaId);
        $persona->estados_id = $estadoId;
        $persona->save();
        return $persona;
    }

    public function buscarPersona($query)
    {
        $personas = Persona::where('dni', 'LIKE', "%$query%")
            ->orWhere('nombre', 'LIKE', "%$query%")
            ->orWhere('apellido', 'LIKE', "%$query%")
            ->get();
    
        return $personas;
    }
}
