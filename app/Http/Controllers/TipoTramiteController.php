<?php

namespace App\Http\Controllers;

use App\Models\TipoTramite;
use Illuminate\Http\Request;

class TipoTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function listar()
    {

        $tipoTramite = TipoTramite::all();
        if(count($tipoTramite)>0){
            return response()->json(['res'=>true,'cantidad'=>count($tipoTramite),'tipotramite'=>$tipoTramite]);
        }else{
            return response()->json(['res'=>true,'cantidad'=>count($tipoTramite),'mensaje'=>'Aun no existen registros en la BD']);

        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $tipo = $request->all();

        $tipo_tramite_new = array();
        $tipo_tramite_new['nombre'] = $tipo['nombre'];
        $tipo_tramite_new['precio'] = $tipo['precio'];
        $tramite = TipoTramite::create($tipo_tramite_new);
        if($tramite){
            return response()->json(['res'=>true,'mensaje'=>'registro creado con exito','tipotramite'=>$tramite]);
        }else{
            return response()->json(['res'=>true,'mensaje'=>'No se a podido crear el regitro','tipotramite'=>$tramite]);

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
    public function show(TipoTramite $tipoTramite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        if(!isset($request->id)){
            return response()->json(['res'=>true,'mensaje'=>'Debe enviar un id valido para editar el registro']);
        }
        $tramite = TipoTramite::where('id',$request->id)->first();
        $tramite->nombre = isset($request->nombre) ? $request->nombre : $tramite->nombre;
        $tramite->precio = isset($request->precio) ? $request->precio : $tramite->precio; 
        $tramite->save();
        return response()->json(['res'=>true,'mensaje'=>'Registro actualizado con exito','tramite'=>$tramite]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoTramite $tipoTramite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if(!isset($request->id)){
            return response()->json(['res'=>true,'mensaje'=>'Debe enviar id del registro a eliminar']);
        }
        $tramite = TipoTramite::find($request->id);
        $tramite->delete();
        return response()->json(['res'=>true,'mensaje'=>'Registro eliminado correctamente','tipotramite'=>$tramite]);

    }
}
