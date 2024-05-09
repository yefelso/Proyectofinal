@extends("maestra")
@section("titulo", "Agregar producto")
@section("contenido")
    <style>
        /* Estilos para los input */
        .form-control.fuchsia {
            border-color: #ff00ff; /* Color fucsia para el borde */
            font-family: "Times New Roman", Times, serif; /* Cambiar el tipo de fuente */
            font-weight: bold; /* Fuente en negrita */
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Agregar producto</h1>
                <form method="POST" action="{{route('productos.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="label">Código de barras</label>
                        <input required autocomplete="off" name="codigo_barras" class="form-control fuchsia"
                               type="text" placeholder="Código de barras">
                    </div>
                    <div class="form-group">
                        <label class="label">Descripción</label>
                        <input required autocomplete="off" name="descripcion" class="form-control fuchsia"
                               type="text" placeholder="Descripción">
                    </div>
                    <div class="form-group">
                        <label class="label">Precio de compra</label>
                        <input required autocomplete="off" name="precio_compra" class="form-control fuchsia"
                               type="decimal(9,2)" placeholder="Precio de compra">
                    </div>
                    <div class="form-group">
                        <label class="label">Precio de venta</label>
                        <input required autocomplete="off" name="precio_venta" class="form-control fuchsia"
                               type="decimal(9,2)" placeholder="Precio de venta">
                    </div>
                    <div class="form-group">
                        <label class="label">Existencia</label>
                        <input required autocomplete="off" name="existencia" class="form-control fuchsia"
                               type="decimal(9,2)" placeholder="Existencia">
                    </div>
                    <div class="form-group">
                        <label class="label">Imagen</label><br>
                        <label class="label">de preferencia jpeg y asegurarse que la imagen no esté dañada</label>
                        <input required name="imagen" class="form-control fuchsia" type="file">
                    </div>

                    @include("notificacion")
                    <button class="btn btn-success">Guardar</button>
                    <a class="btn btn-primary" href="{{route('productos.index')}}">Volver al listado</a>
                </form>
            </div>
        </div>
    </div>
@endsection
