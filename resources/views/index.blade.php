<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-API de Reclutamiento</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#000000]">

<div class="text-white flex gap-10 flex-col mx-10 my-5 items-center">
    <h1 class="text-4xl">Mini-API Laravel</h1>

    <div class="p-5 shadow-xl/30 rounded-xl min-w-[300px] lg:min-w-[650px] bg-[#ffffff] text-black">
        <h2 class="text-2xl font-bold">Enviar Datos (POST)</h2>
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
            <button type="submit" class="font-bold py-2 w-full border-1 border-black rounded-2xl cursor-pointer hover:text-white hover:bg-[#000] transition duration-500">Enviar</button>
        </form>
    </div>

    <div class="flex flex-col gap-10 items-center">
        <h2 class="text-2xl border-[#fff] border-1 rounded-2xl px-5 py-1 w-fit">Datos de la API (GET)</h2>
        @if ($reclutas)
            @foreach ($reclutas as $recluta)
            <div class="bg-[#fff] p-5 text-black min-w-[500px] rounded-2xl">
                <strong>Nombre:</strong> {{ $recluta['name'] ?? 'N/A' }}<br>
                <strong>Apellido:</strong> {{ $recluta['suraname'] ?? 'N/A' }}<br>
                <strong>Cumpleaños:</strong> {{ $recluta['birthday'] ?? 'N/A' }}<br>
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