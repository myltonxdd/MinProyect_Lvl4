<?php

namespace App\Http\Controllers;

use App\Models\docentes;
use Exception;
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
        try {
            $nuevaPersona = new docentes();
            if($body->name){
                $nuevaPersona->name = $body->name;
            }else{
                return "Debe tener nombre";
            }
            if($body->email){
                $nuevaPersona->email = $body->email;
            }else{
                return "Debe tener email";
            }
        
            $nuevaPersona->save();
            return "El Docente fue agregado correctamente";

        } catch (Exception $e) {
            return $e->getMessage();
        }
        
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
        foreach($docentes as $docente){
            $docente->cursos;
        }
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
    public function update(Request $request, $id)
    {
        try {
            if(docentes::find($id) != null){
                $edita = docentes::find($id);
                if($request->name){
                    $edita ->name = $request->name;
                }
                if($request->email){
                    $edita ->email = $request->email;
                }
                if($request->state){
                    if($request->state != 0 || $request->state != 1){
                        return "Recuerda que solo puede ser 0 o 1. Donde 0 es desactivado y 1 activado";
                    }else{
                        $edita ->state = $request->state;    
                    }
                }
                $edita->save();
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
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
