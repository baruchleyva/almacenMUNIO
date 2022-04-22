<?php

namespace App\Http\Controllers;

use App\Proveedors;
use App\Producto;
use App\Inventarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos = Inventarios::select('productos.descripcion', 'proveedors.nombre', 'inventarios.existencia')
                ->join('productos', 'productos.id', '=', 'id_producto')
                ->join('proveedors', 'proveedors.id', '=', 'id_proveedor')
                ->get();
        //$productos = DB::SELECT($pro);
        return view("Inventario.inventario_index", compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("Inventario.inventario_create", ["productos" => Producto::all(), "proveedores" => Proveedors::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        (new Inventarios($request->input()))->saveOrFail();
        return redirect()->route("inventario.index")->with("mensaje", "Entrada agregada correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Proveedor $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedors $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Proveedor $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedors $proveedor)
    {
        return view("proveedors.proveedores_edit", ["proveedor" => $proveedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Proveedor $Proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedors $proveedor)
    {
        $proveedor->fill($request->input());
        $proveedor->saveOrFail();
        return redirect()->route("proveedors.index")->with("mensaje", "Proveedor actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Proveedor $Proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedors $proveedor)
    {
        $proveedor->delete();
        return redirect()->route("proveedors.index")->with("mensaje", "Proveedor eliminado");
    }
}
