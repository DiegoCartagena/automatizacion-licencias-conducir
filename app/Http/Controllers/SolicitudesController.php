<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use App\Models\Licencias;
use App\Models\solicitudes;
use App\Models\User;
use App\Models\TipoTramite;
use App\Models\Pagos;
use App\Models\ResExamenes;
use App\Models\Solicitud;
use App\Models\SolicitudHasDocumentos;
use Illuminate\Http\Request;

class SolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = solicitudes::all();
        foreach ($solicitudes as $key => $solicitud) {
            # code...
            $solicitud->usuario_creacion = User::where('id',$solicitud->id_usuario)->first();
            $pagos = Pagos::where('solicitud_id',$solicitud->id)->first();
            if($pagos){
                $pagos->status =( $pagos->status==2 ) ? 'Aprobado' : (($pagos->status==3) ? 'Rechazado' : 'Pendiente') ;
                $solicitud->pagos=$pagos;
            }
            $solicitud->licencias = Licencias::where('id_usuario',$solicitud->usuario_creacion->id)->get();
            $examenes = ResExamenes::where('id_solicitud',$solicitud->id)->get();
            $solicitud->examenes = $examenes;
            $solicitud->usuario_actualizacion = User::where('id',$solicitud->usuario_actualizacion)->first();
            $documentos = SolicitudHasDocumentos::where('id_solicitud',$solicitud->id)->get(); 
            if($documentos){
                foreach ($documentos as $key => $documento) {
                    $documento->doc = Documentos::where('id',$documento->id)->get();
                }   
                $solicitud->documentos=$documentos;
            }
            $solicitud->tipo_tramite = TipoTramite::where('id',$solicitud->id_tipo_tramite)->first();
        }

            return inertia('Solicitudes/Index',['solicitudes' => $solicitudes]);

    }


    // listar 

    public function listar ()
    {
        $solicitudes = solicitudes::all();
        foreach ($solicitudes as $key => $solicitud) {
            # code...
            $solicitud->usuario_creacion = User::where('id',$solicitud->id_usuario)->first();
            $pagos = Pagos::where('solicitud_id',$solicitud->id)->first();
            if($pagos){
                $pagos->status =( $pagos->status==2 ) ? 'Aprobado' : (($pagos->status==3) ? 'Rechazado' : 'Pendiente') ;
                $solicitud->pagos=$pagos;
            }
            $solicitud->licencias = Licencias::where('id_usuario',$solicitud->usuario_creacion->id)->get();

            $solicitud->usuario_actualizacion = User::where('id',$solicitud->usuario_actualizacion)->first();
             $documentos = SolicitudHasDocumentos::where('id_solicitud',$solicitud->id)->get(); 
             $examenes = ResExamenes::where('id_solicitud',$solicitud->id)->get();
            $solicitud->examenes = $examenes;
            if($documentos){
                foreach ($documentos as $key => $documento) {
                    $documento->doc = Documentos::where('id',$documento->id)->get();
                }   
                $solicitud->documentos=$documentos;
            }
            $solicitud->tipo_tramite = TipoTramite::where('id',$solicitud->id_tipo_tramite)->first();
        }   
        return response()->json(['res'=>true, $solicitudes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    try {
        $data = $request->all();
        $solicitud = [];
       
        $solicitud['id_usuario']=$data['usuario']['id'];
        $tipo_tramite = TipoTramite::where('nombre',$data["tipo"])->first();
        $solicitud['id_tipo_tramite'] = $tipo_tramite['id'];
        $solicitud['usuario_actualizacion'] = $data['usuario']['id'];
        $res = Solicitudes::create($solicitud);  
        
             return response()->json(['res'=>true,'data' => $res]);
    } catch (\Exception $e) {
        var_dump('Error al crear solicitud: '.$e);die($e);
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
    public function show(int $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
            if($request->id){
    
                $data = $request->all();
                $solicitud = Solicitudes::where('id',$request->id)->first();
                foreach ($data as $clave => $valor) {
                    $solicitud->$clave=$valor;
                }
                    $res = $solicitud->save();
                    $solicitud->usuario_creacion = User::where('id',$solicitud->id_usuario)->first();
                    $pagos = Pagos::where('solicitud_id',$solicitud->id)->first();
                    if($pagos){
                        $pagos->status =( $pagos->status==2 ) ? 'Aprobado' : (($pagos->status==3) ? 'Rechazado' : 'Pendiente') ;
                        $solicitud->pagos=$pagos;
                    }
                    $solicitud->licencias = Licencias::where('id_usuario',$solicitud->usuario_creacion->id)->get();
        
                    $solicitud->usuario_actualizacion = User::where('id',$solicitud->usuario_actualizacion)->first();
                     $documentos = SolicitudHasDocumentos::where('id_solicitud',$solicitud->id)->get(); 
                     $examenes = ResExamenes::where('id_solicitud',$solicitud->id)->get();
                    $solicitud->examenes = $examenes;
                    if($documentos){
                        foreach ($documentos as $key => $documento) {
                            $documento->doc = Documentos::where('id',$documento->id)->get();
                        }   
                        $solicitud->documentos=$documentos;
                    }
                    $solicitud->tipo_tramite = TipoTramite::where('id',$solicitud->id_tipo_tramite)->first();
                    return response()->json(['res'=>true,'solicitud'=>$solicitud]);
            }else{
                return response()->json(['res'=>false,'mensaje'=>'el id de solicitud es requerido']);
            }
            //code...
        } catch (\Exception $e) {
            var_dump('Error al editar solicitud: '.$e);die($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, solicitudes $solicitudes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            if($request->id){
                $solicitud = Solicitudes::where('id',$request->id)->first();
                $res = $solicitud->delete();
                return response()->json(['res'=>true,'solicitud'=>$solicitud]);
            }else{
                return response()->json(['res'=>false,"mensaje"=>'El id es requerido para eliminar solicitudes']);
            }
            
        } catch (\Throwable $th) {
            
        }
    }
}
