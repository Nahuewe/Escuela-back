<?php

namespace App\Http\Controllers;
use App\Http\Resources\FormacionResource;
use App\Services\FormacionService;

class FormacionController extends Controller
{
    protected $FormacionService;

    public function __construct(FormacionService $FormacionService)
    {
        $this->FormacionService = $FormacionService;
    }

    public function index()
    {
        $Formacion=$this->FormacionService->FormacionLista();
        return FormacionResource::collection($Formacion);
    }
}


