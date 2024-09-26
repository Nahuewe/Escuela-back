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
        $docente = $this->DocenteService->DocenteDatos($id);
        return new DocenteShowResource($docente);
    }

    public function buscarDocente(Request $request)
    {
        try {
            $query = $request->input('query');
            $docente = $this->DocenteService->buscarDocente($query);
    
            return DocenteResource::collection($docente);
        } catch (\Exception $e) {
            throw new CustomizeException('Docente no encontrada');
        }
    }

    public function DocenteAll()
    {
        $docente = $this->DocenteService->DocenteAll();
        return DocenteResource::collection($docente);
    }

    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
    
        $docente = $this->DocenteService->DocenteLista($perPage);
    
        return DocenteResource::collection($docente);
    }

    public function show($id)
    {
        $docente = Docente::findOrFail($id);

        return new DocenteShowResource($docente);
    }

    public function store(DocenteRequest $request)
    {
        $docente = $this->DocenteService->crearDocente($request->validated());
        return new DocenteShowResource($docente);
    }

    public function update(DocenteRequest $request, $id)
    {
        $docente = $this->DocenteService->actualizarDocente($id, $request->validated());
        return new DocenteShowResource($docente);
    }

    public function destroy($id)
    {
        $this->DocenteService->eliminarDocente($id);
        return response()->json(null, 204);
    }
}

