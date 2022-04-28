

@extends('layouts.aplicacion')

@section("content")
<script src="{{asset('js/TableToExcel.js')}}"></script>
<script type="text/javascript">
    function checarP() {
        // body...
        var id_pro = $('#inputGroupSelect01').val();
        var id_prov = $('#inputGroupSelect02').val();
        //console.log(id_pro);
        $('#id_producto').val(id_pro);
        $('#id_proveedor').val(id_prov);
        $a = $('#id_producto').val();
        $b = $('#id_proveedor').val();

        $ex = $('#existencia').val();
        $('#cantidad').val($ex);
        //console.log(id_pro);
        //console.log(id_prov);
        if($a != '' && $b != ''){
            document.getElementById('formulario1').submit();
        }

    }
</script>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 align="center"><br>Agregar Entrada</h1>

            <form id="formulario1" method="POST" action="{{route('inventario.store')}}">
                @csrf
                <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Productos</label>
                      </div>
                      <select class="custom-select" id="inputGroupSelect01">
                        <option value="0" selected hidden>Selecciona un producto</option>
                        @foreach($productos as $datos)
                            <option value="{{$datos['id']}}">{{ $datos['descripcion']}}</option>
                        @endforeach
                      </select>
                      <div style="display:none;"><input type="text" name="id_producto" id="id_producto"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect02">Proveedores</label>
                      </div>
                      <select class="custom-select" id="inputGroupSelect02">
                        <option value="0" selected hidden>Selecciona un proveedor</option>
                        @foreach($proveedores as $datos)
                            <option value="{{$datos['id']}}">{{ $datos['nombre']}}</option>
                        @endforeach
                      </select>
                      <div style="display:none;"><input type="text" name="id_proveedor" id="id_proveedor"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Cantidad Entregada</label>
                    <input  autocomplete="off" name="existencia" id="existencia" class="form-control"
                           type="text" placeholder="Cantidad Entregada" >

                </div>
                <input name="cantidad" id="cantidad" class="form-control" type="hidden">
                <input type="hidden" name="id_socio" value="{{Auth::user()->id}}">

                
                <button class="btn btn-success" type="button" onclick="checarP()">Guardar</button>
                <a class="btn btn-primary" href="{{route('inventario.index')}}">Volver al listado</a>
            </form>
        </div>
    </div>
    <br>
    <h2>&nbsp;&nbsp;Entradas Registradas</h2>
    <div>&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="tableToExcel('example2', 'Entradas','Entradas')" type="button" class="btn btn-outline-success" id="exceltabla" name="exceltabla">EXCEL  <i class="fas fa-file-excel" aria-hidden="true"></i></button></div>
<div align='center' class="table-responsive col-md-12 order-md-1">
   <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%; ">
                    <thead style="text-align: center;" class="thead-dark" id="panel">
                        <tr>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Folio Entrada</th>

                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Producto</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Proveedor</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Cantidad recibida</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Cantidad restante por producto</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de entrega</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Descargar reporte</th>


                        </tr>
                    </thead>
                    <tbody>

                        <!-- <input type="hidden" value="{{ $contador = 1 }}"> -->
                        @foreach ($entradas as $dato)
                        <tr>


                            <td align="center">{{$dato->id}}</td>
                            <td align="center">{{$dato->descripcion}}</td>
                            <td align="center">{{$dato->nombre}}</td>
                            <td align="center" >{{$dato->existencia}}</td>
                            <td align="center">{{$dato->cantidad}}</td>

                            <td align="center">{{$dato->created_at}}</td>


                             <td align="center">
                              <form action="{{route('inventario.descargarPDF2')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{$dato->id}}">
                                    <input type="hidden" name="desc" id="desc" value="{{$dato->descripcion}}">
                                    <input type="hidden" name="nom" id="nom" value="{{$dato->nombre}}">
                                    <input type="hidden" name="ex" id="ex" value="{{$dato->existencia}}">
                                    <input type="hidden" name="can" id="can" value="{{$dato->cantidad}}">
                                    <input type="hidden" name="created_at" id="created_at" value="{{$dato->created_at}}">

                                    <button class="btn btn-primary" type="submit" style="background-color: #De1428; border-color: #De1428;"> <i class='fas fa-file-pdf'></i>

                                   </button>

                                </form>


                            </td>


                        </tr>

                        @endforeach
                    </tbody>
                </table>

                 <table id="example2" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%; display: none; ">
                    <thead style="text-align: center;" class="thead-dark" id="panel">
                        <tr>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Folio Entrada</th>

                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Producto</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Proveedor</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Cantidad recibida</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Cantidad restante por producto</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de entrega</th>
                           


                        </tr>
                    </thead>
                    <tbody>

                        <!-- <input type="hidden" value="{{ $contador = 1 }}"> -->
                        @foreach ($entradas as $dato)
                        <tr>


                            <td align="center">{{$dato->id}}</td>
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
@endsection
