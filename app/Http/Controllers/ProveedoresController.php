<?php

namespace App\Http\Controllers;

use App\Proveedors;
use Illuminate\Http\Request;

class proveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("proveedors.proveedores_index", ["proveedores" => Proveedors::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("proveedors.proveedores_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        (new Proveedors($request->input()))->saveOrFail();
        return redirect()->route("proveedors.index")->with("mensaje", "Proveedor agregado");
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
