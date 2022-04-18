@extends('layouts.aplicacion')

@section("content")
<script type="text/javascript">
     $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange:true,
            paging:true,
            colReorder: true,
            responsive: true,
            autoWidth:false,
            ordering: true,
            language: {
                        "emptyTable": "No hay datos disponibles",
                        "search": "Buscar:",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 de 0 Entradas",
                        "lengthMenu": "Mostrar _MENU_ registros",
                },

        });




    });
</script>
    <div class="row">
        <div class="col-12">
            <h1>
                <br>
                Reportes <i class="fas fa-paste"></i></h1>
                <div class="row">
                    <div class="col-4">
                        
                            <!--<div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Filtrar</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" disabled>
                                <option selected hidden>Selecciona una opción</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                          </select>-->
                          
                        &nbsp;&nbsp;<a href="{{route("productos.reporte")}}" class="btn btn-danger mb-2">Descargar Reporte <i class='fas fa-file-pdf'></i></a>
                    
                        
                    </div>
                    
                </div>


            <!--@ include("notificacion")-->
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" >
                    <thead>
                    <tr>
                        <th>Código de barras</th>
                        <th>Descripción</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
                        <th>Utilidad</th>
                        <th>Existencia</th>
                        <th>Fecha de registro</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto['codigo_barras']}}</td>
                            <td>{{$producto['descripcion']}}</td>
                            <td>${{$producto['precio_compra']}}</td>
                            <td>${{$producto['precio_venta']}}</td>
                            <td>${{number_format($producto['precio_venta'] - $producto['precio_compra'],2)}}</td>
                            <td>{{number_format($producto['existencia'],0)}}</td>
                            <td>{{$producto['created_at']}}</td>
                           
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
