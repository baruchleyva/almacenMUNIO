<?php
?>
<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Proveedors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        //}else{
            //$productos = Producto::where('id_socio','=',Auth::user()->id)->get();
            //return view("productos.productos_index", compact('productos'));
            //return view("productos.productos_index");
        //}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedors::SELECT('*')->get();
        return view("productos.productos_create", compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $codigo = $request->input('codigo_barras');

       $resultado  = Producto::where('codigo_barras','=',$codigo)->exists();
        //if (fnRouter::existeRouter()){}

       //$query="SELECT EXISTS (SELECT * FROM productos WHERE codigo_barras='$codigo')";

       //$resultado = DB::SELECT($query);


    if ($resultado) {  

        return redirect()->route("productos.create")->with([ "mensaje" => "El codigo de barras ingresado ya existe, verifique.", "tipo" => "danger"]);  
                    
               

            //Aqui colocas el código que tu deseas realizar cuando el dato existe en la base de datos
    }else{
       

                   $producto = new Producto($request->input());
        $producto->saveOrFail();
        return redirect()->route("productos.index")->with("mensaje", "Producto guardado");   
           //Aqui colocas el código que tu deseas realizar cuando el dato NO existe en la base de datos
        
    }   


        
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
