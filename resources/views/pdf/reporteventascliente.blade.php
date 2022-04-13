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
       
	<div class="titulo" ><img src="../public/img/logots.png" align="left" style="width: 120px; height: 60px;"> </div>
	<br>
	<h3 align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reporte de ventas TeamSide - Por Cliente</h3> 
	<table>
		<thead style="font-size: 8">
			<tr>
			            
                        <th>Cliente</th>
                        <th>Descripción</th>
                        <th>Precio del producto</th>
                        <th>Cantidad</th>
                        <th>Descuento %</th>
                        <th>Tipo de venta</th>
                        <th>Precio final</th>
                        <th>Fecha y hora</th>
                       
		   </tr>
		</thead>
		
		<tbody>
			<?php $total=0; ?>
			@foreach($ventasc as $v)
			<tr>
				<!--<td td style="text-align: center;">{{$v['id']}}</td>-->
				<td style="font-size: 7">{{$v['nombre']}}</td>
				<td style="font-size: 7">{{$v['descripcion']}}</td>
				<td style="font-size: 8">${{$v['precio']}}</td>
				<td style="text-align: center; font-size: 8;">{{number_format($v['cantidad'])}}</td>
				<td style="text-align: center; font-size: 8">{{$v['descuento']}}</td>
				<td style="font-size: 8">{{$v['tipoventa']}}</td>
				<td style="font-size: 8">{{$v['precio_final']}}</td>
				<td style="font-size: 7">{{$v['fecha']}}</td>
				

			</tr>
                  <?php 
                 
				$total +=$v['precio_final'];
				?>

			@endforeach
		</tbody>
	</table>
	<br>
<h5>Total Vendido: $<?php echo number_format($total, 2) ?></h5>
</body>
</html>