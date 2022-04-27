<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		

		.titulo{
			text-align: center;
			font: 2rem,
			color:blue;

		}
		table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
	</style>
</head>
<body>
<script type="text/php">
        if ( isset($pdf) ) {
            $y = $pdf->get_height() - 20;
            $x = $pdf->get_width() - 15 - 50;
            $pdf->page_text($x, $y, "N° de Pág: {PAGE_NUM} de {PAGE_COUNT}", '', 8, array(0,0,0));
        }
    </script>
    <footer style="width: 100%; " id="footer">
    </footer>
       
	<div class="titulo" ><img src="{{asset('images/team.png')}}" align="left" style="width: 120px; height: 60px;"> </div>
	<br>
	<h3 align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inventario de productos BMS</h3> 
	<div align='center' class="table-responsive col-md-12 order-md-1">
   <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%; ">
                    <thead style="text-align: center;" class="thead-dark" id="panel">
                        <tr>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Codigo de barras</th>

                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Producto</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Proveedor</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Cantidad recibida</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Cantidad restante por producto</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de entrega</th>
                            


                        </tr>
                    </thead>
                    <tbody>

                        <!-- <input type="hidden" value="{{ $contador = 1 }}"> -->
                        @foreach ($productos as $dato)
                        <tr>


                            <td align="center">{{$dato->codigo_barras}}</td>
                            <td align="center">{{$dato->descripcion}}</td>
                            <td align="center">{{$dato->nombre}}</td>
                            <td align="center" >{{$dato->existencia}}</td>
                            <td align="center">{{$dato->cantidad}}</td>

                            <td align="center">{{$dato->created_at}}</td>


                          

                        </tr>

                        @endforeach
                    </tbody>
                </table>
</div>
<br>
<h3>Total en Almacen</h3>
 <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%; ">
                    <thead style="text-align: center;" class="thead-dark" id="panel">
                        <tr>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Codigo de barras</th
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Producto</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Existencia en almacen</th>
                            
                            


                        </tr>
                    </thead>
                    <tbody>

                        <!-- <input type="hidden" value="{{ $contador = 1 }}"> -->
                        @foreach ($inv as $dato)
                        <tr>


                            <td align="center">{{$dato->codigo_barras}}</td>
                            <td align="center">{{$dato->descripcion}}</td>
                            
                            <td align="center" >{{$dato->existencia}}</td>
                           


                          

                        </tr>

                        @endforeach
                    </tbody>
                </table>
</div>
                <br>
              
	<br>
<h5>BMS Software Solutions 2022</h5>
</body>
</html>