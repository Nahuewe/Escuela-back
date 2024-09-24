<?php

namespace App\Services;

use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonaService
{
    public function personaTabla()
    {
        $persona = Persona::orderBy('nombre', 'asc')->paginate(10);
        return $persona;
    }

    public function personaAll()
    {
        $persona=Persona::orderBy('nombre', 'asc')->get();
        return $persona;
    }

    public function getLegajos()
    {
        return Persona::pluck('legajo');
    }

    public function verPersona($id)
    {
        $persona = Persona::with([
            // 'documentaciones'
        ])->findOrFail($id);
        return $persona;
    }

    public function personaCrear($data)
    {
        DB::beginTransaction();

        try {

            $data['persona']['estados_id'] = 3;
            $persona = Persona::create($data['persona']);

            // if (isset($data['documentacion'])) {
            //     $this->asignarDocumentos($persona->id, $data['documentacion']);
            // }

            DB::commit();

            return $persona;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error al crear persona: ' . $e->getMessage());
            throw $e;
        }
    }

    // public function asignarDocumentos($id, $data)
    // {
    //     foreach ($data as $documentacion) {

    //         $docu=Documentacion::where('id',$documentacion['id'])->first();
    //         $docu['persona_id']=$id;
    //         $docu->update();

    //     }
    // }

    public function personaActualizar($personaId, $data)
    {
        DB::beginTransaction();

        try {
            $persona = Persona::findOrFail($personaId);

            // Actualizar datos de la persona
            $persona->update($data['persona']);

            // Manejo de documentación
            // if (isset($data['documentacion'])) {
            //     $this->asignarDocumentos($persona->id, $data['documentacion']);
            // } 
            // DB::commit();

            return $persona;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error al actualizar persona: ' . $e->getMessage());
            throw $e;
        }
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
        $persona = Persona::all();
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
