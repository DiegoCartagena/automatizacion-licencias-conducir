<?php

namespace App\Http\Controllers;

use App\Models\solicitudes;
use App\Models\User;
use App\Models\TipoTramite;
use App\Models\Pagos;
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
            $solicitud->pagos = Pagos::where('solicitud_id',$solicitud->id)->first();
            $solicitud->usuario_actualizacion = User::where('id',$solicitud->usuario_actualizacion)->first();
            $solicitud->tipo_tramite = TipoTramite::where('id',$solicitud->id_tipo_tramite)->first();
        }
        
        //{

            return inertia('Solicitudes/Index',['solicitudes' => $solicitudes]);
        //}else{
          //  return response()->json(['res'=>false]);
        //}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //creacion de solicitud
        
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
    public function show(solicitudes $solicitudes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(solicitudes $solicitudes)
    {
        //
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
    public function destroy(solicitudes $solicitudes)
    {
        //
    }
}
