<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('inicio');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get("/acerca-de", function () {
    return view("misc.acerca_de");
})->name("acerca_de.index");
Route::get("/soporte", function(){
    return redirect("https://parzibyte.me/blog/contrataciones-ayuda/");
})->name("soporte.index");

Auth::routes([
    "reset" => false,// no pueden olvidar contraseña
]);

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
// Permitir logout con petición get
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->route("home");
})->name("logout");


Route::middleware("auth")
    ->group(function () {
        Route::resource('clientes', 'App\Http\Controllers\ClientesController');
        Route::resource("usuarios", "App\Http\Controllers\UserController")->parameters(["usuarios" => "user"]);
        Route::resource("productos", "App\Http\Controllers\ProductosController");
        Route::get("/ventas/ticket", "App\Http\Controllers\VentasController@ticket")->name("ventas.ticket");
        Route::resource("ventas", "App\Http\Controllers\VentasController");
        Route::get("/vender", "App\Http\Controllers\VenderController@index")->name("vender.index");
        Route::post("/productoDeVenta", "App\Http\Controllers\VenderController@agregarProductoVenta")->name("agregarProductoVenta");
        Route::delete("/productoDeVenta", "App\Http\Controllers\VenderController@quitarProductoDeVenta")->name("quitarProductoDeVenta");
        Route::post("/terminarOCancelarVenta", "App\Http\Controllers\VenderController@terminarOCancelarVenta")->name("terminarOCancelarVenta");
    });


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/maestra', function () {
    return view('maestra');
})->name('maestra');



