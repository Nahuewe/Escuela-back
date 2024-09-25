<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomizeException;
use App\Http\Requests\DocenteRequest;
use App\Services\DocenteService;
use App\Http\Resources\DocenteResource;
use App\Http\Resources\DocenteShowResource;
use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    protected $DocenteService;
    
    public function __construct(DocenteService $DocenteService)
    {
        $this->DocenteService = $DocenteService;
    }

    public function DocenteDatos($id)
    {
        $Docente = $this->DocenteService->DocenteDatos($id);
        return new DocenteShowResource($Docente);
    }

    public function buscarDocente(Request $request)
    {
        try {
            $query = $request->input('query');
            $Docente = $this->DocenteService->buscarDocente($query);
    
            return DocenteResource::collection($Docente);
        } catch (\Exception $e) {
            throw new CustomizeException('Docente no encontrada');
        }
    }

    public function DocenteAll()
    {
        $Docente = $this->DocenteService->DocenteAll();
        return DocenteResource::collection($Docente);
    }

    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
    
        $Docentes = $this->DocenteService->DocenteLista($perPage);
    
        return DocenteResource::collection($Docentes);
    }

    public function show($id)
    {
        $Docente = Docente::findOrFail($id);

        return new DocenteShowResource($Docente);
    }

    public function store(DocenteRequest $request)
    {
        $Docente = $this->DocenteService->crearDocente($request->validated());
        return new DocenteShowResource($Docente);
    }

    public function update(DocenteRequest $request, $id)
    {
        $Docente = $this->DocenteService->actualizarDocente($id, $request->validated());
        return new DocenteShowResource($Docente);
    }

    public function destroy($id)
    {
        $this->DocenteService->eliminarDocente($id);
        return response()->json(null, 204);
    }
}

