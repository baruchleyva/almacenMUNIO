
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
                Areas </h1>




            <!--@ include("notificacion")-->
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Area</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto['id']}}</td>
                            <td>{{$producto->area}}</td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
