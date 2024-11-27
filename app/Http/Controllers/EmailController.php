<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        $solicitud = (object) [
            'nombre_solicitante' => 'Juan Pérez',
            'rut' => '12.345.678-9',
            'tipo_tramite' => 'Renovación de Licencia de Conducir',
            'fecha_agendada' => '2024-11-28',
            'hora_agendada' => '10:30',
            'correo' => 'd.develop2022@gmail.com',
        ];
        $to = $solicitud->correo;
        $subject='Confirmacion hora Licencia de conducir';
        $template='emails.confirmacion_hora';   
        $data = [
            'nombre_solicitante' => $solicitud->nombre_solicitante,
            'rut' => $solicitud->rut,
            'tipo_tramite' => $solicitud->tipo_tramite,
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
}

