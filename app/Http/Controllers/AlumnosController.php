<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Illuminate\Http\Request;

class AlumnosController extends Controller
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
        $nuevaPersona = new alumnos();
        $nuevaPersona->name = $body->name;
        $nuevaPersona->email = $body->email;
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
    public function show(alumnos $alumnos)
    {
        $alumnos = alumnos::all();
        return $alumnos;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alumnos $alumnos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, alumnos $alumnos)
    {
        $edita = alumnos::find($request->id);
        $edita ->name = $request->name;
        $edita ->email = $request->email;
        $edita ->state = $request->state;
        $edita->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alumnos $alumnos)
    {
        $borra = alumnos::find($alumnos->id);
        $borra->state =0;

        $borra->save();
    }
}
