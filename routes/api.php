<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RolesController;

Route::get('personalista', [PersonaController::class,'listapersona']);
Route::get('personaAll', [PersonaController::class,'personaAll']);
Route::get('legajos', [PersonaController::class, 'legajos']);
Route::get('buscar-persona', [PersonaController::class,'buscarPersona']);
Route::post('/cambiar-estado', [PersonaController::class, 'cambiarEstado']);
Route::apiResource('personas', PersonaController::class);
Route::apiResource('agencia', AgenciaController::class);
Route::get('agenciaAll', [AgenciaController::class,'agenciaAll']);
Route::get('/agenciaDatos/{id}', [AgenciaController::class,'agenciaDatos']);
Route::get('buscar-agencia', [AgenciaController::class, 'buscarAgencia']);
Route::apiResource('sexo', SexoController::class);
Route::apiResource('/user', UserController::class);
Route::apiResource('/roles',RolesController::class);
Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->middleware('auth:sanctum');
Route::post('/registrar', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('file', FileController::class);
