<?php

namespace App\Http\Controllers;

use App\Models\Licencias;
use Illuminate\Http\Request;

class LicenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function listar()
    { try {
        //code...
        $licencias = Licencias::all();
        if(count($licencias)>0){
            foreach ($licencias as $licencia) {
                $licencia->fecha_renovacion = 'dentro de '. $licencia->vigencia_anos;

            }
            return response()->json(['res'=>true,'licencias'=>$licencias]);
        }else{
            return response()->json(['res'=>false]);

        }
    } catch (\Exception $e) {
            var_dump('error al listar');die($e);
    }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $data = $request->all();

        try {
            //code...
            $licencia_new = array();
            $licencia_new['tipo'] = $data['tipo'];
            $licencia_new['vigencia_anos'] = $data['vigencia'];
            $licencia_new['folio'] = $data['folio'];
            $licencia_new['id_usuario'] = $data['id_usuario'];
            $licencia_new['observaciones'] = $data['observaciones'];
            $licencia_new['fotografia'] = $data['fotografia']; 
            $licencia = Licencias::create($licencia_new);
            if($licencia){
            return response()->json(['res'=>true, 'licencia'=>$licencia]);
        }else{
            return response()->json(['res'=>false]);
        }
        } catch (\Exception $e) {
            var_dump('Error al crear licencia');die($e);
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
    public function show(Request $request)
    {
        if(!isset($request->id)){
            return response()->json(['res'=>false,'mensaje'=>'Debe enviar un id valido']);
        }
        $licencia = Licencias::where('id',$request->id)->first();
        return response()->json(['res'=>true,'Mesaje'=>'Licencia encontrada con exito','licencia'=>$licencia]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
        if(!isset($request->id)){
            return response()->json(['res'=>false,'mensaje'=> 'debe enviar el id de la licencia a editar']);
        }
        $licencia = Licencias::where('id',$request->id)->first();
        $licencia->tipo = isset($request->tipo) ? $request->tipo : $licencia->tipo;
        $licencia->vigencia_anos = isset($request->vigencia)? $request->vigencia: $licencia->vigencia;
        $licencia->folio = isset($request->folio)? $request->folio : $licencia->folio;  
        $licencia->observaciones = isset($request->observcaciones) ? $request->observaciones : $licencia->observaciones;
        $licencia->fotografia = isset($request->fotografia)? $request->fotografia : $licencia->fotografia;
        $licencia->save();
            return response()->json(['res'=>true, 'licencia'=>$licencia]);
      
        } catch (\Exception $e) {
            var_dump('Error al crear licencia');die($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Licencias $licencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
        try {
            if(!isset($request->id)){
                return response()->json(['res'=>false,'mensaje'=> 'debe enviar el id de la licencia a editar']);
            }
            $licencia = Licencias::find($request->id);
            $licencia->delete();
                return response()->json(['res'=>true,'mensaje'=>'eliminado correctamente' ,'licencia'=>$licencia]);
          
            } catch (\Exception $e) {
                var_dump('Error al eliminar licencia');die($e);
            }
    }
}
