<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Venta</title>
    <style>
        /* Estilos CSS para el ticket */
        .ticket-container {
            border: 2px solid #000; /* Color y grosor del borde */
            padding: 20px; /* Espacio alrededor del contenido */
            max-width: 600px; /* Ancho máximo del contenedor */
            margin: 0 auto; /* Centrar el contenedor horizontalmente */
            font-family: Arial, sans-serif; /* Fuente del texto */
        }

        /* Estilos para los títulos */
        h1, h2 {
            margin-top: 0; /* Eliminar margen superior */
        }

        /* Estilos para el listado de productos */
        ul {
            list-style-type: none; /* Eliminar viñetas */
            padding: 0; /* Eliminar padding */
        }

        ul li {
            margin-bottom: 10px; /* Espacio entre elementos de la lista */
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <h1>Ticket de Venta</h1>
        <p><strong>Fecha de Venta:</strong> {{ $venta->created_at }}</p>
        <p><strong>Cliente:</strong> {{ $venta->cliente->nombre }}</p>
        <hr>
        <h2>Productos:</h2>
        <ul>
            @foreach ($venta->productos as $producto)
                <li>{{ $producto->cantidad }}x {{ $producto->descripcion }} - ${{ number_format($producto->cantidad * $producto->precio, 2) }}</li>
            @endforeach
        </ul>
        <hr>
        <p><strong>Total:</strong> ${{ number_format($total, 2) }}</p>
        <p>Gracias por su compra.</p>
    </div>
    <!-- Puedes agregar más contenido o estilos según sea necesario -->
</body>
</html>
