<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Aprobado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            color: #4CAF50;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">¡Pago Aprobado!</h1>
        <p>Estimado/a {{ $data['nombre'] }},</p>
        <p>Nos complace informarle que su pago por la solicitud de  <strong>{{ $data['tramite'] }}</strong> ha sido aprobado exitosamente.</p>
        <p>Detalles del pago:</p>
        <ul>
            <li>Monto: {{ $data['monto'] }}</li>
            <li>Fecha: {{ $data['fecha'] }}</li>
        </ul>
        <p>Si tiene alguna duda, no dude en contactarnos.</p>
        <p>Atentamente,</p>
        <p><strong>Departamento de transito Municipalidad de la Florida</strong></p>
        <div class="footer">
            <p>Este es un mensaje automático. Por favor, no responda a este correo.</p>
        </div>
    </div>
</body>
</html>
