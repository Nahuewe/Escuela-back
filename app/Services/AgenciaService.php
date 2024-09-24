<?php

namespace App\Services;

use App\Models\Agencia;
use GuzzleHttp\Psr7\Request;

class AgenciaService
{
    public function AgenciaLista($perPage = 10)
    {
        $query = Agencia::query();
        return $query->paginate($perPage);
    }

    public function agenciaAll()
    {
        $agencia=Agencia::orderBy('nombre', 'asc')->get();
        return $agencia;
    }

    public function verAgencia($id)
    {
        return Agencia::findOrFail($id);
    }

    public function index(Request $request)
    {
        $agencia = Agencia::paginate(10);
        return response()->json($agencia);
    }

    public function AgenciaDatos($id)
    {
        return Agencia::findOrFail($id);
    }

    public function crearAgencia($data)
    {
        return Agencia::create($data);
    }

    public function actualizarAgencia($id, $data)
    {
        $agencia = Agencia::findOrFail($id);
        $agencia->update($data);
        return $agencia;
    }

    public function eliminarAgencia($id)
    {
        $agencia = Agencia::findOrFail($id);
        $agencia->delete();
    }

public function buscarAgencia($query)
{
    $agencia = Agencia::where('nombre', 'LIKE', "%$query%")
        ->orWhere('domicilio_trabajo', 'LIKE', "%$query%")
        ->orWhere('telefono_laboral', 'LIKE', "%$query%")
        ->get();

    return $agencia;
}
}
