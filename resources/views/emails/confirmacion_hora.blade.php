<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Hora Agendada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #007bff;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            font-size: 0.9em;
            color: #666;
        }
        .highlight {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Confirmación de Hora Agendada</h1>
        </div>

        <p>Estimado/a <span class="highlight">{{ $data['nombre_solicitante'] }}</span>,</p>

        <p>
            Hemos confirmado la hora agendada para el siguiente trámite:
        </p>

        <div class="details">
            <p><strong>Tipo de Trámite:</strong> {{ $data['tipo_tramite'] }}</p>
            <p><strong>Fecha Agendada:</strong> {{ $data['fecha_agendada'] }}</p>
            <p><strong>Hora Agendada:</strong> {{ $data['hora_agendada'] }}</p>
            <p><strong>RUT del Solicitante:</strong> {{ $data['rut'] }}</p>
        </div>
@if($data['tipo_tramite' ]==='Renovación de Licencia de Conducir')
        <p>
            Por favor, asegúrese de presentarse el día y hora indicados con su cedula de identidad y Licencia de conducir.
        </p>
@else
        <p>
            Por favor, asegúrese de presentarse el día y hora indicados con Los documentos requeridos para su tramite.
        </p>
    @endif
        <p>
            En caso de cualquier duda o cambio, puede contactarnos respondiendo a este correo o llamando a nuestro servicio de atención al cliente.
        </p>

        <div class="footer">
            <p>Gracias por utilizar los servicios de la Municipalidad de La Florida.</p>
            <p>Este correo es generado automáticamente. Por favor, no responda directamente a este mensaje.</p>
        </div>
    </div>
</body>
</html>
