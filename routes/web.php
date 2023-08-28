<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CursosAlumnosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\DocentesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AlumnosController::class)->group(function(){
    Route::get('alumnos', "show");
});

Route::controller(CursosController::class)->group(function(){
    Route::get('cursos', "show");
});

Route::controller(CursosAlumnosController::class)->group(function(){
    Route::get('cursos_alumnos', "show");
});

Route::controller(DocentesController::class)->group(function(){
    Route::get('docentes', "show"); 
});

