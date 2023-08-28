<?php

namespace App\Http\Controllers;

use App\Models\cursos_alumnos;
use Illuminate\Http\Request;

class CursosAlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $body)
    {
        $nuevaPersona = new cursos_alumnos();
        $nuevaPersona->curso_id = $body->curso_id;
        $nuevaPersona->alumno_id = $body->alumno_id;
        $nuevaPersona->asistencia = $body->asistencia;
        $nuevaPersona->state = $body->state;
        $nuevaPersona->save();
        return "El Alumno fue agregado correctamente";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cursos_alumnos $cursos_alumnos)
    {
        $cursos_alumnos = cursos_alumnos::all();
        return $cursos_alumnos;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cursos_alumnos $cursos_alumnos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cursos_alumnos $cursos_alumnos)
    {
        $edita = cursos_alumnos::find($request->id);
        $edita ->curso_id = $request->curso_id;
        $edita ->alumno_id = $request->alumno_id;
        $edita ->asistencia = $request->asistencia;
        $edita ->state = $request->state;
        $edita->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cursos_alumnos $cursos_alumnos)
    {
        $borra = cursos_alumnos::find($cursos_alumnos->id);
        $borra->state =0;

        $borra->save();
    
    }
}
