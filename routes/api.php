<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CursosAlumnosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\DocentesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(AlumnosController::class)->group(function(){
    Route::post('alumnos/create', "create");
    Route::put('alumnos/update/{id}', "update");
    Route::put('alumnos/destroy/{id}', "destroy");
});

Route::controller(CursosController::class)->group(function(){
    Route::post('cursos/create', "create");
    Route::put('cursos/update/{id}', "update");
    Route::put('cursos/destroy/{id}', "destroy");
});

Route::controller(CursosAlumnosController::class)->group(function(){
    Route::post('cursos_alumnos/create', "create");
    Route::put('cursos_alumnos/update/{id}', "update");
    Route::put('cursos_alumnos/destroy/{id}', "destroy");
});

Route::controller(DocentesController::class)->group(function(){
    Route::post('docentes/create', "create");
    Route::put('docentes/update/{id}', "update");
    Route::put('docentes/destroy/{id}', "destroy");
});
