
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
                Productos / Inventario <i class="fa fa-box"></i></h1>
                <div class="row">
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <!--<div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Filtrar</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" disabled>
                                <option selected hidden>Selecciona una opción</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                          </select>-->
                        </div>
                    </div>
                    <div class="col-8" align="right">
                        <a href="{{route("productos.create")}}" class="btn btn-success mb-2">Agregar</a>
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

                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->codigo_barras}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>${{$producto->precio_compra}}</td>
                            <td>${{$producto->precio_venta}}</td>
                            <td>${{number_format($producto->precio_venta - $producto->precio_compra,2)}}</td>
                            <td>{{number_format($producto->existencia,0)}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route("productos.edit",[$producto])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("productos.destroy", [$producto])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
