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
        return view("Inventario.inventario_salidas", compact('productos','proveedores'));
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
    public function store2(Request $request)
    {
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


        $area = Areas::select('area')->where('id','=',$id_area)->get();
        $descripcion = Producto::select('descripcion')->where('descripcion','=',$descripcion)->get();
        $cant = $cant;
        $pdf = PDF::loadView('pdf.salida_inv', compact('area', 'descripcion', 'cant'));
        return $pdf->download('salida_inventario.pdf');
        //$this->descargarPDF($descripcion,$id_area,$cant);


        //$this->descargarPDF($descripcion, $id_area, $cantidad);
        //return redirect()->route("inventario.index")->with("mensaje", "Salida agregada correctamente");

        (new Inventario_salidas($request->input()))->saveOrFail();
        return redirect()->route("inventario.index")->with("mensaje", "Salida agregada correctamente");
    }

    public function descargarPDF($descripcion, $id_area, $cant)
    {
        $area = Areas::select('area')->where('id','=',$id_area)->get();
        $descripcion = Producto::select('descripcion')->where('descripcion','=',$descripcion)->get();
        $cant = $cant;
        $pdf = PDF::loadView('pdf.salida_inv', compact('area', 'descripcion', 'cant'));
        return $pdf->download('salida_inventario.pdf');
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
