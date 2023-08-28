<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use App\Models\docentes;
use Exception;
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
        try {
            $nuevaPersona = new cursos();
            if($body->name){
                $nuevaPersona->name = $body->name;
            }else{
                return "Debe tener nombre";
            }

            if($body->docente_id){
                $alumAll = docentes::where('state','=',1)->where('id','=',$body->docente_id)->get();
                if(count($alumAll)== 0){
                    return "Verifica si el id del docente es correcto o verifica si esta activo el docente, Por favor vuelve a hacer la consulta con un id de docente valido";
                }else{
                    $nuevaPersona->docente_id = $body->docente_id;
                }
            }
        
            $nuevaPersona->save();
            return "El curso fue creado correctamente";
            
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
    public function show(cursos $cursos)
    {
        $cursos = cursos::all();
        foreach($cursos as $curso){
            $curso->docente;
        }
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
    public function update(Request $request, $id)
    {
        try {
            if (cursos::find($id) != null){
                $edita = cursos::find($id);
                if($request->all()){
                    if($request->name){
                        $edita ->name = $request->name;
                    }
                    if($request->docente_id){
                        $alumAll = docentes::where('state','=',1)->where('id','=',$request->docente_id)->get();
                        if(count($alumAll)== 0){
                            return "Verifica si el id del docente es correcto o verifica si esta activo el docente, Por favor vuelve a hacer la consulta con un id de docente valido";
                        }else{
                            $edita ->docente_id = $request->docente_id;
                        }
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
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
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
