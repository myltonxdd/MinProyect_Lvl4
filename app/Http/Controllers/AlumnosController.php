<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Exception;
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
        try {
            $nuevaPersona = new alumnos();
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
            return "El Alumno fue agregado correctamente";
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
    public function update(Request $request, $id)
    {
        try {
            if(alumnos::find($id) != null){

                $edita = alumnos::find($id);
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
    public function destroy(alumnos $alumnos)
    {
        $borra = alumnos::find($alumnos->id);
        $borra->state =0;

        $borra->save();
    }
}
