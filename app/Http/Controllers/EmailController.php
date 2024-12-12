<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Enviar un correo electrónico con un template y datos personalizados.
     *
     * @param string $template Nombre del template blade (sin extensión .blade.php)
     * @param array $data Datos a pasar al template
     * @param string $to Correo del destinatario
     * @param string $subject Asunto del correo
     */
    public function sendEmail(Request $request)
    {
        $solicitud = (object) $request->all();
        //var_dump($solicitud);die();
        $to = $solicitud->usuario_creacion['email'];
        $subject='Confirmacion hora Licencia de conducir';
        $template='emails.confirmacion_hora';   
        $data = [
            'nombre_solicitante' => $solicitud->usuario_creacion['name'],
            'rut' => $solicitud->usuario_creacion['rut'],
            'tipo_tramite' => $solicitud->tipo_tramite['nombre'],
            'fecha_agendada' => $solicitud->fecha_agendada,
            'hora_agendada' => $solicitud->hora_agendada,
        ];
        try {
            // Enviar correo
            Mail::send($template, ['data'=>$data], function ($message) use ($to, $subject) {
                $message->to($to)
                        ->subject($subject);
            });

            return response()->json(['message' => 'Correo enviado exitosamente.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al enviar el correo.', 'error' => $e->getMessage()], 500);
        }
    }
    public function confirmarPago(Request $request)
    {
        $solicitud = (object) $request->all();
       
        $to = $solicitud->usuario_creacion['email'];
        $subject='Su pago en Municipalidad de la Florida ha sido aprobado';
        $template='emails.pagoAprobado';   
        $data = [
            'nombre' => $solicitud->usuario_creacion['name'],
            'monto' => number_format($solicitud->tipo_tramite['precio'],'0',',','.'),
            'tramite' => $solicitud->tipo_tramite['nombre'],
            'fecha' =>  $this->formatDate($solicitud->created_at),

        ];
        
        try {
            // Enviar correo
            Mail::send($template, ['data'=>$data], function ($message) use ($to, $subject) {
                $message->to($to)
                        ->subject($subject);
            });

            return response()->json(['message' => 'Correo enviado exitosamente.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al enviar el correo.', 'error' => $e->getMessage()], 500);
        }
    }

    public function rechazarPago(Request $request)
    {
        $solicitud = (object) $request->all();
       
        $to = $solicitud->usuario_creacion['email'];
        $subject='Su pago en Municipalidad de la Florida ha sido rechazado';
        $template='emails.pagoRechazado';   
        $data = [
            'nombre' => $solicitud->usuario_creacion['name'],
            'monto' => number_format($solicitud->tipo_tramite['precio'],'0',',','.'),
            'tramite' => $solicitud->tipo_tramite['nombre'],
            'motivo' =>  'Error al momento de realizar el pago',

        ];
        
        try {
            // Enviar correo
            Mail::send($template, ['data'=>$data], function ($message) use ($to, $subject) {
                $message->to($to)
                        ->subject($subject);
            });

            return response()->json(['message' => 'Correo enviado exitosamente.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al enviar el correo.', 'error' => $e->getMessage()], 500);
        }
    }
    function formatDate($isoString) {
        // Convertir la cadena ISO a un objeto DateTime
        $date = new DateTime($isoString);
    
        // Incrementar el día en 1
        
    
        // Formatear como "d/m/Y"
        return $date->format('d/m/Y');
    }
}

