<?php

namespace App\Http\Controllers;

use App\Proveedors;
use App\Producto;
use App\Inventarios;
use App\Areas;
use App\Inventario_salidas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class inventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*$productos = Inventarios::selectRaw('productos.descripcion','sum(inventarios.existencia)')
                ->join('productos', 'productos.id', '=', 'id_producto')
                ->groupBy('productos.descripcion')
                ->get();*/
        $p = "SELECT productos.descripcion,
                    SUM(inventarios.cantidad) as existencia
                    from inventarios
                    inner join productos on productos.id = id_producto
                    GROUP BY productos.descripcion";
            $productos = DB::SELECT($p);
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
        $productos = Producto::all();
        $proveedores = Proveedors::all();
        $query= "SELECT inventarios.id,
                        productos.descripcion,
                        inventarios.existencia,
                        inventarios.cantidad,
                        inventarios.precio,
                        proveedors.nombre,
                        inventarios.created_at
                        from inventarios
                        inner join productos on productos.id = inventarios.id_producto
                        INNER JOIN proveedors ON proveedors.id = inventarios.id_proveedor
                        ORDER BY inventarios.created_at DESC";
        $entradas = DB::SELECT($query);

        return view("Inventario.inventario_create", compact('productos','proveedores','entradas'));
    }

    public function salidas()
    {
            /*$productos = Inventarios::selectRaw('productos.descripcion','sum(inventarios.existencia)')
                ->join('productos', 'productos.id', '=', 'id_producto')
                ->groupBy('productos.descripcion')
                ->get();*/
            $p = "SELECT productos.descripcion,
                    SUM(inventarios.cantidad) as existencia
                    from inventarios
                    inner join productos on productos.id = id_producto
                    GROUP BY productos.descripcion";
            $productos = DB::SELECT($p);
            $proveedores = Areas::all();

            $s="SELECT s.id, s.id_inv,s.id_area,a.area, s.existencia,s.created_at FROM inventario_salidas s
LEFT JOIN areas a ON a.id=s.id_area
ORDER BY s.created_at asc";

        $salidas = DB::SELECT($s);


        return view("Inventario.inventario_salidas", compact('productos','proveedores','salidas'));
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
        return redirect()->route("inventario.create")->with("mensaje", "Entrada agregada correctamente");
    }
    public function store2(Request $request)
    {
         if($request->ajax()){
                $descripcion = $request->get('id_inv');
        $id_area = $request->get('id_area');
        $cantidad = $request->get('existencia');//20
        $cant = $request->get('existencia');//20

        $query = "SELECT i.id, p.descripcion, i.existencia, i.cantidad FROM inventarios i INNER JOIN productos p ON p.id = i.id_producto WHERE p.descripcion = '$descripcion'";
        $datosQ = DB::SELECT($query);

        foreach ($datosQ as $datos) {
            //
            $exis = $datos->cantidad;//10
            $id = $datos->id;//7

            if($cantidad <= $exis){
                $exis = $exis - $cantidad;
                $cantidad = 0;
                //update
                Inventarios::where('id','=',$id)->update(['cantidad' => $exis]);
            }else{
                $cantidad = $cantidad-$exis;//10
                $exis = 0;
                //update
                Inventarios::where('id','=',$id)->update(['cantidad' => $exis]);
            }
        }


        (new Inventario_salidas($request->input()))->saveOrFail();
        
        //$this->descargarPDF($descripcion,$id_area,$cant);
        

        //$this->descargarPDF($descripcion, $id_area, $cantidad);
        //return redirect()->route("inventario.index")->with("mensaje", "Salida agregada correctamente");

       
         }

        return "exito";
        //return redirect()->route("inventario.index")->with("mensaje", "Salida agregada correctamente");
    }

    public function descargarPDF(Request $request)
    {
        $descripcion = $request->get('desc');
        $id_area = $request->get('id_a');
        $cant= $request->get('ca');
        $created_at= $request->get('created_at');

        $area = Areas::select('area')->where('id','=',$id_area)->get();
        $descripcion = Producto::select('descripcion')->where('descripcion','=',$descripcion)->get();
        $cant = $cant;
        $pdf = PDF::loadView('pdf.salida_inv', compact('area', 'descripcion', 'cant','created_at'));
        return $pdf->download('salida_inventario.pdf');
    }

    public function descargarPDF2(Request $request)
    {
        
        $id = $request->get('id');
        $descripcion = $request->get('desc');
        $nombre= $request->get('nom');
        $exist= $request->get('ex');
        $cant= $request->get('can');
        $precio= $request->get('pre');
        $created_at= $request->get('created_at');

        //$area = Areas::select('area')->where('id','=',$id_area)->get();
        //$descripcion = Producto::select('descripcion')->where('descripcion','=',$descripcion)->get();
        $cant = $cant;
        $pdf = PDF::loadView('pdf.entrada_inv', compact('id', 'descripcion', 'nombre','exist','cant','precio','created_at'));
        return $pdf->download('entrada_inventario.pdf');
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
