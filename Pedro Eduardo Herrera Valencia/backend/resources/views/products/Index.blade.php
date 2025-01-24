<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Personalización de colores en escala de grises */
        body {
            background-color: #f0f0f0;
            color: #333;
        }
        table {
            background-color: #fff;
        }
        th, td {
            background-color: #f9f9f9;
        }
        th {
            background-color: #e0e0e0;
        }
        .btn-create {
            background-color: #616161;
            color: white;
        }
        .btn-create:hover {
            background-color: #424242;
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <h1 class="text-center text-dark">Lista de Productos</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-create">Crear Producto</a>
        </div>

        <!-- Mostrar productos -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Fecha de Creación</th>
                    <th>Última Actualización</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->nombre }}</td>
                        <td>${{ number_format($product->precio, 2) }}</td>
                        <td>{{ $product->created_at->format('d M Y H:i') }}</td>
                        <td>{{ $product->updated_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
