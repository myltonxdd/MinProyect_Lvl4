<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
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
        $nuevaPersona = new cursos();
        $nuevaPersona->name = $body->name;
        $nuevaPersona->docente_id = $body->adocente_id;
        $nuevaPersona->state = $body->state;
        $nuevaPersona->save();
        return "El curso fue creado correctamente";
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
    public function show(cursos $cursos)
    {
        $cursos = cursos::all();
        return $cursos;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cursos $cursos)
    {
        $edita = cursos::find($request->id);
        $edita ->name = $request->name;
        $edita ->docente_id = $request->docente_id;
        $edita ->state = $request->state;
        $edita->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cursos $cursos)
    {
        $borra = cursos::find($cursos->id);
        $borra->state =0;

        $borra->save();
    
    }
}
