<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-API de Reclutamiento</title>
    <style>
        body { font-family: sans-serif; margin: 2em; line-height: 1.6; }
        h1, h2 { color: #333; }
        .container { max-width: 800px; margin: 0 auto; }
        .form-section { background: #f4f4f4; padding: 1.5em; border-radius: 8px; margin-bottom: 2em; }
        .data-section { border: 1px solid #ccc; padding: 1em; border-radius: 8px; }
        .recluta { border-bottom: 1px solid #ddd; padding: 10px 0; }
        .recluta:last-child { border-bottom: none; }
        input[type="text"], input[type="email"] { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { background: #007bff; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Mini-API de Reclutamiento</h1>

    <div class="form-section">
        <h2>Enviar Datos</h2>
        <form action="/" method="POST">
            @csrf <label for="name">Nombre:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <label for="suraname">Apellido</label><br>
            <input type="text" id="suraname" name="suraname" required><br><br>
            <label for="birthday">Fecha de nacimiento</label><br>
            <input type="text" id="birthday" name="birthday" required><br><br>
            <label for="documentType">Tipo de documento</label><br>
            <input type="text" id="documentType" name="documentType" required><br><br>
            <label for="documentNumber">Numero de documento</label><br>
            <input type="number" id="documentNumber" name="documentNumber" required><br><br>
            <button type="submit">Enviar</button>
        </form>
    </div>

    <div class="data-section">
        <h2>Datos de la API(GET)</h2>
        @if ($reclutas)
            @foreach ($reclutas as $recluta)
            <div class="recluta">
                <strong>Nombre:</strong> {{ $recluta['name'] ?? 'N/A' }}<br>
                <strong>Apellido:</strong> {{ $recluta['suraname'] ?? 'N/A' }}<br>
                <strong>Cumpleaños:</strong> {{ $recluta['birthday'] ?? 'N/A' }}
                <strong>Edad:</strong> {{ $recluta['age'] ?? 'N/A' }}<br>
                <strong>Tipo de documento:</strong> {{ $recluta['documentType'] ?? 'N/A' }}<br>
                <strong>Numero de documento:</strong> {{ $recluta['documentNumber'] ?? 'N/A' }}
            </div>
            @endforeach
        @else
            <p>No se encontraron datos de reclutas.</p>
        @endif
    </div>
</div>

</body>
</html>