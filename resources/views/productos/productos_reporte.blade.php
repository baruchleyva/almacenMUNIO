@extends('layouts.aplicacion')

@section("content")
<script src="{{asset('js/TableToExcel.js')}}"></script>
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
                Reporte de inventario <i class="fas fa-paste"></i></h1>
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
                          
                        &nbsp;&nbsp;<a href="{{route("productos.reporte")}}" class="btn btn-outline-danger">PDF <i class='fas fa-file-pdf'></i></a>
                    <button onclick="tableToExcel('example3', 'Inventario','Inventario')" type="button" class="btn btn-outline-success" id="exceltabla" name="exceltabla">EXCEL  <i class="fas fa-file-excel" aria-hidden="true"></i></button></div>
                        
                    
                    
                </div>


            <!--@ include("notificacion")-->
           <div align='center' class="table-responsive col-md-12 order-md-1">
   <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%; ">
                    <thead style="text-align: center;" class="thead-dark" id="panel">
                        <tr>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Código de barras</th>

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
                           @csrf
                                    <input type="hidden" name="id" id="id" value="{{$dato->id}}">
                                    <input type="hidden" name="cb" id="cb" value="{{$dato->codigo_barras}}">
                                    <input type="hidden" name="desc" id="desc" value="{{$dato->descripcion}}">
                                    <input type="hidden" name="nom" id="nom" value="{{$dato->nombre}}">
                                    <input type="hidden" name="ex" id="ex" value="{{$dato->existencia}}">
                                    <input type="hidden" name="can" id="can" value="{{$dato->cantidad}}">
                                    <input type="hidden" name="created_at" id="created_at" value="{{$dato->created_at}}">
                        @endforeach
                    </tbody>
                </table>

                <h3>Total en Almacen</h3>
 <table id="example2" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%; ">
                    <thead style="text-align: center;" class="thead-dark" id="panel">
                        <tr>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Codigo de barras</th>
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


                <table id="example3" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%; display: none; ">
                    <thead style="text-align: center;" class="thead-dark" id="panel">
                       
                        <tr>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Código de barras</th>

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


                           @csrf
                                    <input type="hidden" name="id" id="id" value="{{$dato->id}}">
                                    <input type="hidden" name="cb" id="cb" value="{{$dato->codigo_barras}}">
                                    <input type="hidden" name="desc" id="desc" value="{{$dato->descripcion}}">
                                    <input type="hidden" name="nom" id="nom" value="{{$dato->nombre}}">
                                    <input type="hidden" name="ex" id="ex" value="{{$dato->existencia}}">
                                    <input type="hidden" name="can" id="can" value="{{$dato->cantidad}}">
                                    <input type="hidden" name="created_at" id="created_at" value="{{$dato->created_at}}">
                        @endforeach

                    </tbody>
               

                
 
                    <thead style="text-align: center;" class="thead-dark" id="panel">
                        <tr>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Codigo de barras</th>
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
        </div>
    </div>
@endsection
