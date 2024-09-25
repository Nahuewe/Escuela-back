<?php

namespace App\Services;

use App\Models\Docente;
use GuzzleHttp\Psr7\Request;

class DocenteService
{
    public function DocenteLista($perPage = 10)
    {
        $query = Docente::query();
        return $query->paginate($perPage);
    }

    public function DocenteAll()
    {
        $Docente=Docente::orderBy('nombre', 'asc')->get();
        return $Docente;
    }

    public function verDocente($id)
    {
        return Docente::findOrFail($id);
    }

    public function index(Request $request)
    {
        $Docente = Docente::paginate(10);
        return response()->json($Docente);
    }

    public function DocenteDatos($id)
    {
        return Docente::findOrFail($id);
    }

    public function crearDocente($data)
    {
        return Docente::create($data);
    }

    public function actualizarDocente($id, $data)
    {
        $Docente = Docente::findOrFail($id);
        $Docente->update($data);
        return $Docente;
    }

    public function eliminarDocente($id)
    {
        $Docente = Docente::findOrFail($id);
        $Docente->delete();
    }

public function buscarDocente($query)
{
    $Docente = Docente::where('nombre', 'LIKE', "%$query%")
        ->orWhere('domicilio_trabajo', 'LIKE', "%$query%")
        ->orWhere('telefono_laboral', 'LIKE', "%$query%")
        ->get();

    return $Docente;
}
}
