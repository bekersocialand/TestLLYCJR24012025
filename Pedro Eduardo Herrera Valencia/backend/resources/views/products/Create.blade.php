<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0e0e0; /* Gris claro de fondo */
        }

        h1 {
            text-align: center;
            color: #555; /* Gris más oscuro para el texto */
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* Fondo blanco del formulario */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        label {
            font-size: 1.1em;
            margin-bottom: 5px;
            display: block;
            color: #555; /* Gris para las etiquetas */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc; /* Borde gris */
            border-radius: 5px;
            background-color: #f9f9f9; /* Fondo gris muy claro */
            color: #333; /* Color del texto en los campos */
        }

        .btn {
            background-color: #888; /* Gris para el botón */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #666; /* Gris más oscuro al pasar el ratón */
        }

        .btn-regresar {
            background-color: #bbb; /* Gris claro para el botón de regresar */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-regresar:hover {
            background-color: #999; /* Gris más oscuro al pasar el ratón */
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

    <h1>Crear Nuevo Producto</h1>

    <!-- Formulario para crear un producto -->
    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <!-- Campo de nombre -->
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required minlength="3">

        <!-- Campo de precio -->
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" value="{{ old('precio') }}" required step="0.01" min="0.1">

        <!-- Botón de enviar -->
        <button type="submit" class="btn">Guardar Producto</button>

        <!-- Botón de regresar -->
        <a href="javascript:history.back()" class="btn-regresar">Regresar</a>
    </form>

</body>
</html>
