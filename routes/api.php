<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;

// Alumnos
Route::apiResource('personas', PersonaController::class);
Route::get('personalista', [PersonaController::class,'listapersona']);
Route::get('personaAll', [PersonaController::class,'personaAll']);
Route::get('buscar-persona', [PersonaController::class,'buscarPersona']);
Route::post('/cambiar-estado', [PersonaController::class, 'cambiarEstado']);
// Docentes
Route::apiResource('docente', DocenteController::class);
Route::get('docenteAll', [DocenteController::class,'docenteAll']);
Route::get('buscar-docente', [DocenteController::class, 'buscarDocente']);
// Formacion
Route::apiResource('formacion', FormacionController::class);
// Auth
Route::post('/registrar', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->middleware('auth:sanctum');
// Endpoints extra
Route::apiResource('sexo', SexoController::class);
Route::apiResource('/user', UserController::class);
Route::apiResource('/roles',RolesController::class);