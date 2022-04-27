<?php
?>
<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Proveedors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
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

    public function panelReportes()
    {
       $query= "SELECT inventarios.id,
                        productos.codigo_barras,
                        productos.descripcion,
                        inventarios.existencia,
                        inventarios.cantidad,
                        proveedors.nombre,
                        inventarios.created_at
                        from inventarios
                        inner join productos on productos.id = inventarios.id_producto
                        INNER JOIN proveedors ON proveedors.id = inventarios.id_proveedor
                        ORDER BY inventarios.created_at DESC";
        $productos = DB::SELECT($query);

        return view('productos.productos_reporte', compact('productos'));
        
           
         
    }

public function reporte()
    {
        $query= "SELECT inventarios.id,
                        productos.codigo_barras,
                        productos.descripcion,
                        inventarios.existencia,
                        inventarios.cantidad,
                        proveedors.nombre,
                        inventarios.created_at
                        from inventarios
                        inner join productos on productos.id = inventarios.id_producto
                        INNER JOIN proveedors ON proveedors.id = inventarios.id_proveedor
                        ORDER BY inventarios.created_at DESC";
        $productos = DB::SELECT($query);

         $p = "SELECT productos.descripcion,productos.codigo_barras,
                    SUM(inventarios.cantidad) as existencia
                    from inventarios
                    inner join productos on productos.id = id_producto
                    GROUP BY productos.descripcion,productos.codigo_barras
                    order by productos.codigo_barras";
            $inv = DB::SELECT($p);


        $data= compact('productos','inv');
        $pdf = PDF::loadView('pdf.inventario', $data);
        return $pdf->download('reporte_inventario.pdf');
           
         
    }

}
