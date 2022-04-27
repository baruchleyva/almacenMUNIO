
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
                Inventario <i class="fa fa-box"></i></h1>
                <div class="row">
                    <div class="col-12">
                            <!--<div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Filtrar</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" disabled>
                                <option selected hidden>Selecciona una opción</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                          </select>-->
                          <a href="{{route("productos.index")}}" class="btn btn-success mb-2">Productos</a>
                          <a href="{{route("productos.create")}}" class="btn btn-primary mb-2">Nuevo Producto</a>
                          <a href="{{route("proveedors.index")}}" class="btn btn-warning mb-2">Proveedores</a>
                          <a href="{{route("proveedors.create")}}" class="btn btn-secondary mb-2">Nuevo Proveedor</a>
                          <a href="{{route("areas.index")}}" class="btn btn-info mb-2">Areas</a>

                    </div>
                    <!--<div class="col-8" align="right">
                        <a href="{ {route("productos.create")}}" class="btn btn-success mb-2">Agregar</a>
                    </div>-->
                </div>
                <div class="row" style="float: right;">
                    <div class="col-12">
                        <a href="{{route("inventario.create")}}" class="btn btn-danger mb-2">Entradas</a>
                        <a href="{{route("inventario.salidas")}}" class="btn btn-danger mb-2">Salidas</a>
                    </div>
                </div>


            <!--@ include("notificacion")-->
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" >
                    <thead>
                    <tr>
                        <th>Producto</th>
                        <!--<th>Proveedor</th>-->
                        <!--<th>Precio de compra</th>-->
                        <th>Cantidad</th>
                        <!--<th>Utilidad</th>
                        <th>Existencia</th>-->

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->descripcion}}</td>
                            <!--<td>{ {$producto->nombre}}</td>-->
                            <td>{{$producto->existencia}}</td>
                            <!--<td>
                                <a class="btn btn-warning" href="{ {route("inventario.edit",[$producto])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{ {route("inventario.destroy", [$producto])}}" method="post">
                                    @ method("delete")
                                    @ csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>-->

                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
