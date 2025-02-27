<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PersonaController, DocenteController, FormacionController,
    AuthController, SexoController, UserController, RolesController
};

// Rutas públicas
Route::post('/registrar', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->middleware('auth:sanctum');

// Rutas protegidas por middleware auth:sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('personas', PersonaController::class);
    Route::get('personalista', [PersonaController::class,'listapersona']);
    Route::get('personaAll', [PersonaController::class,'personaAll']);
    Route::get('buscar-persona', [PersonaController::class,'buscarPersona']);
    Route::post('/cambiar-estado', [PersonaController::class, 'cambiarEstado']);

    Route::apiResource('docente', DocenteController::class);
    Route::get('docenteAll', [DocenteController::class,'docenteAll']);
    Route::get('buscar-docente', [DocenteController::class, 'buscarDocente']);

    Route::apiResource('formacion', FormacionController::class);

    Route::apiResource('sexo', SexoController::class);
    Route::apiResource('/user', UserController::class);
    Route::apiResource('/roles', RolesController::class);
});
