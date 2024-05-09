<?php
?>
<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("productos.productos_index", ["productos" => Producto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("productos.productos_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validar la solicitud
    $request->validate([
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Requisitos para la imagen
    ]);

    // Guardar la imagen en el sistema de archivos
    $imagenPath = $request->file('imagen')->store('public/imagenes');

    // Crear un nuevo Producto
    $producto = new Producto($request->except('imagen'));
    $producto->imagen = Storage::url($imagenPath); // Almacenar la URL de la imagen en la base de datos
    $producto->saveOrFail();

    // Redirigir a la vista index con un mensaje de éxito
    return redirect()->route("productos.index")->with("mensaje", "Producto guardado");
}

    /**
     * Display the specified resource.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view("productos.productos_edit", ["producto" => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->fill($request->input());
        $producto->saveOrFail();
        return redirect()->route("productos.index")->with("mensaje", "Producto actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route("productos.index")->with("mensaje", "Producto eliminado");
    }
}
