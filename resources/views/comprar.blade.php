
    <div class="row">
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($productos as $producto)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{$producto->imagen}}" class="card-img-top" alt="{{$producto->descripcion}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$producto->descripcion}}</h5>
                                <p class="card-text">Precio: {{$producto->precio_venta}}</p>
                            </div>
                            <div class="card-footer">
                                <form action="{{route('agregar_al_carrito', [$producto->id])}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
