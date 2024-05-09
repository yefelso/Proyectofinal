@extends("maestra")
@section("titulo", "Productos")
@section("contenido")
    <style>
        .custom-card {
            margin-top:20px;
            width: 550px; /* Ancho deseado */
            height: 300px; /* Alto deseado */
        }
        .custom-card .card-body {
            display: flex;
            flex-direction: row;
        }
        .custom-card .image-container {
            flex: 0 0 auto;
            width: 40%; /* Ajusta el tamaño de la imagen */
            overflow: hidden;
        }
        .custom-card .image-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .custom-card .content {
            flex: 1;
            padding: 1rem;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @if(isset($productos) && count($productos) > 0)
                    @foreach($productos as $producto)
                        <div class="col">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="image-container">
                                        <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="{{$producto->descripcion}}">
                                    </div>
                                    <div class="content">
                                        <h5 class="card-title">{{$producto->descripcion}}</h5>
                                        <p class="card-text">Precio: {{$producto->precio_venta}}</p><br>
                                        <button class="btn btn-primary">Añadir al carrito</button> <!-- Botón "Añadir al carrito" -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No se encontraron productos.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
