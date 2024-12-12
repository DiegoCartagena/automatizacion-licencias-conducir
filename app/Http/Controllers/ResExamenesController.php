<?php

namespace App\Http\Controllers;

use App\Models\ResExamenes;
use Illuminate\Http\Request;

class ResExamenesController extends Controller
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
    public function create(Request $request)
    {
        try {
            //code...
            if($request->nombre_examen){
                $examen = array();
                $examen['nombre_examen']=$request->nombre_examen;
                $examen['estado'] = $request->estado;
                $examen['puntaje'] = $request->puntaje;
                $examen['porcentaje'] = $request->porcentaje;
                $examen['id_solicitud'] = $request->id_solicitud;
                $res = ResExamenes::create($examen);
                return response()->json(['res'=>true,'Examen'=>$res]);
            }
        } catch (\Exception $e) {
            var_dump("Error al almacenar el resultado");die($e);
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
    public function show(ResExamenes $resExamenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResExamenes $resExamenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResExamenes $resExamenes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResExamenes $resExamenes)
    {
        //
    }
}
