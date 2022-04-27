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
	<h3 align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Entrada de inventario</h3>
	<br>
	<br>
	 
	
	<br>

	<table>
		<thead style="font-size: 12">
			<tr>
			            
                        <th>Folio</th>
                        <th>Producto</th>
                        <th>Proveedor</th>
                        <th>Cantidad Recibida</th>
                        <th>Fecha de Recepción</th>
                        
                        
                       
		   </tr>
		</thead>
		
		<tbody>
			
			
			<tr>
				<!--<td td style="text-align: center;">{ {$v['id']}}</td>-->
				<td style="font-size: 11">{{$id}}</td>
				<td style="font-size: 11">{{$descripcion}}</td>
				<td style="font-size: 11">{{$nombre}}</td>
				<td style="font-size: 11">{{$exist}}</td>
				<td style="font-size: 11">{{$created_at}}</td>
				
				

			</tr>
                  

			
		</tbody>
	</table>

	<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<label style="float: center; position: relative; font-size: 11;">_________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________________<br></label>
<br>
<label></label>
<label style="float: center; position: relative; font-size: 11;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>Proveedor:<B> {{$nombre}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Encargado de Almacen (Nombre y firma)<br></label>
<br>
<label></label>
<label style="float: center; position: relative; font-size: 11;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTREGUÉ MERCANCÍA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RECIBÍ MERCANCÍA</label>

<br>
<br>
<br>
<br>
<br>
<br>
<br>


<h5>BMS Software Solutions 2022</h5>
</body>
</html>