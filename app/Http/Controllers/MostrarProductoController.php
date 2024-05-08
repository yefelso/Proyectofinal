<?php

namespace App\Http\Controllers;

use App\Models\Producto; // Asegúrate de importar el modelo Producto
use Illuminate\Http\Request;

class MostrarProductosController extends Controller
{
    public function index()
    {
        // Obtener todos los productos desde la base de datos
        $productos = Producto::all();

        // Pasar los productos a la vista y mostrarla
        return view('comprar.index', compact('productos'));
    }
}
