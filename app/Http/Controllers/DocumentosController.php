<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use Illuminate\Http\Request;

class DocumentosController extends Controller
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
        try {
            $documentos = Documentos::all();
            if(count($documentos)){
                return response()->json(['res'=>true,'cantidad'=>count($documentos),'documentos'=>$documentos]);
            }
            else{
                return response()->json(['res'=>true,'mensaje'=>'Aun no existen documentos en la BD']);
            }
        } catch (\Exception $e) {
            var_dump('Error al listar Documentos');die('listar Documentos :'.$e);
        }
        
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            
            $doc = $request->all();
       
            $document = array();
            $document['nombre'] = $doc['nombre'];
            $document['usuario_actualizacion'] = $doc['usuario_actualizacion'];
            $document['usuario_creacion'] = $doc['usuario_creacion'];
            $document['b64'] = $doc['b64'];
            $document['tipo'] = $doc['tipo'];
            $documento = Documentos::create($document);
            if($documento){
                return response()->json(['res'=>true,'mensaje'=>'documento creado con exito','documento'=>$documento]);
            }
            else{
                return response()->json(['res'=>true,'mensaje'=>'Aun no existen documentos en la BD']);
            }
        } catch (\Exception $e) {
            var_dump('Error al listar Documentos');die('listar Documentos :'.$e);
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
    public function show(Documentos $documentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        if(!isset($request->id)){
                return response()->json(['res'=>false,'Mensaje'=>'Debe enviar el ID del documento a actualizar']);
        }
        try {
            $documento = Documentos::where('id',$request->id)->first();
            $documento->nombre = isset($request->nombre) ? $request->nombre : $documento->nombre ; 
            $documento->usuario_actualizacion = isset($request->usuario_actualizacion) ? $request->usuario_actualizacion : $documento->usuario_actualizacion; 
            $documento->b64 = isset($request->b64) ? $request->b64 : $documento->b64 ;
            $documento->tipo = isset($request->tipo)? $request->tipo : $documento->tipo;
            $documento->save();
            return response()->json(['res'=>true,'documento'=>$documento]);
            
        } catch (\Exception $e) {
            var_dump('Error al editar documento');die('Editar documento : '. $e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documentos $documentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if(!isset($request->id)){
            return response()->json(['res'=>false,'Mensaje'=>'Debe enviar el id del documento a eliminar']);
        }
        try {
            $documento = Documentos::find($request->id);
            if($documento){
                $documento->delete();
                return response()->json(['res'=>true,'mensaje'=>'Documento eliminado con exito','documentos'=>$documento]);
            }
            else{
                return response()->json(['res'=>false,'mensaje'=>'El documento ya fue eliminado anteriormente']);
            }
        } catch (\Exception $e) {
            var_dump('Error al listar Documentos');die('listar Documentos :'.$e);
        }        
    }
}
