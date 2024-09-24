<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomizeException;
use App\Http\Requests\AgenciaRequest;
use App\Services\AgenciaService;
use App\Http\Resources\AgenciaResource;
use App\Http\Resources\AgenciaShowResource;
use App\Models\Agencia;
use Illuminate\Http\Request;

class AgenciaController extends Controller
{
    protected $AgenciaService;
    

    public function __construct(AgenciaService $AgenciaService)
    {
        $this->AgenciaService = $AgenciaService;
    }

    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
    
        $agencias = $this->AgenciaService->AgenciaLista($perPage);
    
        return AgenciaResource::collection($agencias);
    }

    public function show($id)
    {
        $agencia = Agencia::findOrFail($id);

        return new AgenciaShowResource($agencia);
    }

    public function agenciaDatos($id)
    {
        $agencia = $this->AgenciaService->AgenciaDatos($id);
        return new AgenciaShowResource($agencia);
    }

    public function buscarAgencia(Request $request)
    {
        try {
            $query = $request->input('query');
            $agencia = $this->AgenciaService->buscarAgencia($query);
    
            return AgenciaResource::collection($agencia);
        } catch (\Exception $e) {
            throw new CustomizeException('Agencia no encontrada');
        }
    }

    public function agenciaAll()
    {
        $agencia = $this->AgenciaService->AgenciaAll();
        return AgenciaResource::collection($agencia);
    }

    public function store(AgenciaRequest $request)
    {
        $agencia = $this->AgenciaService->crearAgencia($request->validated());
        return new AgenciaShowResource($agencia);
    }

    public function update(AgenciaRequest $request, $id)
    {
        $agencia = $this->AgenciaService->actualizarAgencia($id, $request->validated());
        return new AgenciaShowResource($agencia);
    }

    public function destroy($id)
    {
        $this->AgenciaService->eliminarAgencia($id);
        return response()->json(null, 204);
    }
}

