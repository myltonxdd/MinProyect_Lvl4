<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use App\Models\cursos;
use App\Models\cursos_alumnos;
use Exception;
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
        try {
            $nuevaPersona = new cursos_alumnos();

            if($body->cursos_id){
                $curseAll = cursos::where('state','=',1)->where('id','=',$body->cursos_id)->get();
                if(count($curseAll)== 0){
                    return "Verifica si el id del curso es correcto o verifica si esta activo el curso, Por favor vuelve a hacer la consulta con un id de curso valido";
                }
                else{
                    $nuevaPersona->cursos_id = $body->cursos_id;
                }
            }

            if($body->alumnos_id){
                $alumAll = alumnos::where('state','=',1)->where('id','=',$body->alumnos_id)->get();
                if(count($alumAll)== 0){
                    return "Verifica si el id del alumno es correcto o verifica si esta activo el alumno, Por favor vuelve a hacer la consulta con un id de alumno valido";
                }else{
                    $nuevaPersona->alumnos_id = $body->alumnos_id;
                }
            }

            if($body->asistencia){
                if($body->state != 0 || $body->state != 1){
                    return "Recuerda que solo puede ser 0 o 1. Donde 0 es desactivado y 1 activado";
                }else{
                    $nuevaPersona->asistencia = $body->asistencia;
                }
            }
            
            $nuevaPersona->save();
            return "La asistencia fue agregada correctamente";
            
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
    public function show(cursos_alumnos $cursos_alumnos)
    {
        $cursos_alumnos = cursos_alumnos::all();
        foreach($cursos_alumnos as $cursos_alumno){
            $cursos_alumno->alumno;
            $cursos_alumno->curso;
        }
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
    public function update(Request $request, $id)
    {
        try {
            if (cursos_alumnos::find($id) != null) {
                $edita = cursos_alumnos::find($id);
                if($request->all()){
                    if($request->alumnos_id){
                        $alumAll = alumnos::where('state','=',1)->where('id','=',$request->alumnos_id)->get();
                        if(count($alumAll)== 0){
                            return "Verifica si el id del alumno es correcto o verifica si esta activo el alumno, Por favor vuelve a hacer la consulta con un id de alumno valido";
                        }else{
                            $edita ->alumnos_id = $request->alumnos_id;
                        }
                    }

                    if($request->cursos_id){
                        $curseAll = cursos::where('state','=',1)->where('id','=',$request->cursos_id)->get();
                        if(count($curseAll)== 0){
                            return "Verifica si el id del curso es correcto o verifica si esta activo el curso, Por favor vuelve a hacer la consulta con un id de curso valido";
                        }else{
                            $edita ->cursos_id = $request->cursos_id;
                        }
                    }

                    if($request->asistencia){
                        if($request->asistencia != "A" || $request->asistencia != "T" || $request->asistencia != "F"){
                            return "Opción de asistencia invalida, recuerda que las opciones son: Asistió temprano (A), Asistió tarde (T) o Faltó (F)";
                        }else{
                            $edita ->asistencia = $request->asistencia;
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
    public function destroy(cursos_alumnos $cursos_alumnos)
    {
        $borra = cursos_alumnos::find($cursos_alumnos->id);
        $borra->state =0;

        $borra->save();
    
    }
}
