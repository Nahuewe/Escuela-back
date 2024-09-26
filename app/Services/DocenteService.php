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
        $docente=Docente::orderBy('nombre', 'asc')->get();
        return $docente;
    }

    public function verDocente($id)
    {
        return Docente::findOrFail($id);
    }

    public function index(Request $request)
    {
        $docente = Docente::paginate(10);
        return response()->json($docente);
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
        $docente = Docente::findOrFail($id);
        $docente->update($data);
        return $docente;
    }

    public function eliminarDocente($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();
    }

public function buscarDocente($query)
{
    $docente = Docente::where('nombre', 'LIKE', "%$query%")
        ->orWhere('formacion', 'LIKE', "%$query%")
        ->get();

    return $docente;
}
}
