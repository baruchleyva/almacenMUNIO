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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('productos.index', [App\Http\Controllers\ProductosController::class, 'index'])->name('productos.index');
Route::get('productos.create', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');
Route::get('productos.edit', [App\Http\Controllers\ProductosController::class, 'edit'])->name('productos.edit');
Route::get('productos.destroy', [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos.destroy');
Route::post('productos.store', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
