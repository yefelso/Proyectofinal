<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class MostrarProductosController extends Controller
{
    /**
     * Muestra todos los productos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los productos desde la base de datos
        $productos = Producto::all();

        // Retornar la vista con los productos
        return view('comprar', compact('productos'));
    }
}