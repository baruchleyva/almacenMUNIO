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
	<h3 align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Salida de inventario</h3>
	<br>
	Producto: {{$descripcion[0]->descripcion}} <br>
	Area: {{$area[0]->area}}<br>
	Cantidad:{{$cant}}
	<br>
<h5>BMS Software Solutions 2022</h5>
</body>
</html>