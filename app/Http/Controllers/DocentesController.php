<?php

namespace App\Http\Controllers;

use App\Models\docentes;
use Illuminate\Http\Request;

class DocentesController extends Controller
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
        $nuevaPersona = new docentes();
        $nuevaPersona->name = $body->name;
        $nuevaPersona->email = $body->email;
        $nuevaPersona->state = $body->state;
        $nuevaPersona->save();
        return "El Docente fue agregado correctamente";
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
    public function show(docentes $docentes)
    {
        $docentes = docentes::all();
        return $docentes;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(docentes $docentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, docentes $docentes)
    {
        $edita = docentes::find($request->id);
        $edita ->name = $request->name;
        $edita ->email = $request->email;
        $edita ->state = $request->state;
        $edita->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(docentes $docentes)
    {
        $borra = docentes::find($docentes->id);
        $borra->state =0;

        $borra->save();
    }
}
