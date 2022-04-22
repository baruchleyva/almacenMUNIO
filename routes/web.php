<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource("productos", "ProductosController");
Route::resource('productos', '\App\Http\Controllers\ProductosController');
Route::resource('proveedors', '\App\Http\Controllers\ProveedoresController');
Route::resource('inventario', '\App\Http\Controllers\InventarioController');
Route::get('productos.panelReportes', [App\Http\Controllers\ProductosController::class, 'panelReportes'])->name('productos.panelReportes');
Route::get('productos.reporte', [App\Http\Controllers\ProductosController::class, 'reporte'])->name('productos.reporte');
/*
Route::get('productos.index', [App\Http\Controllers\ProductosController::class, 'index'])->name('productos.index');
Route::get('productos.create', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');
Route::get('productos.edit', [App\Http\Controllers\ProductosController::class, 'edit'])->name('productos.edit');
Route::get('productos.destroy', [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos.destroy');
Route::post('productos.store', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
Route::get('productos.edit/{id}', [App\Http\Controllers\ProductosController::class, 'edit']);
Route::put('productos.update', [App\Http\Controllers\ProductosController::class, 'update']);//->name('productos.update');
*/