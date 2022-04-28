

@extends('layouts.aplicacion')

@section("content")
<script src="{{asset('js/TableToExcel.js')}}"></script>
<script type="text/javascript">
    function checarP() {
        // body...
        var id_pro = $('#inputGroupSelect01').val();
        var id_prov = $('#inputGroupSelect02').val();
        
        //console.log(id_pro);
        $('#id_inv').val(id_pro);
        $('#id_area').val(id_prov);
        $a = $('#id_inv').val();
        $b = $('#id_area').val();

        var id_inv= $a;
        var id_area = $b;
        //console.log($a+" "+$b);
        //console.log(id_prov);

        var aaa = "cant";
        aaa += id_pro;
        var cant = parseInt(document.getElementById(aaa).value); //$(aaa).val();
        console.log(cant);
        var existencia = parseInt($('#existencia').val());
        console.log(existencia);

        if(existencia > cant){
            alert('La cantidad solicitada de productos supera el número que se tiene en el inventario.');
            //console.log('No agrega');
            /**/
        }else{
            if($a != '' && $b != ''){

                $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('inventario.store2') }}",
        type:"post",
        data: {id_inv:id_inv,id_area:id_area,existencia:existencia},
        success: function(result){
          console.log(result);
          window.location.href = '/public/inventario.salidas';
        }
      });

       
                //console.log('Si agrega')
            }
        }

        //console.log(cant);


    }
</script>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 align="center"><br>Salidas</h1>

            <form id="formulario1" method="POST" action="{{route("inventario.store2")}}">
                @csrf
                <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Productos</label>
                      </div>
                      <select class="custom-select" id="inputGroupSelect01">
                        <option value="0" selected hidden>Selecciona una producto</option>
                        @foreach($productos as $datos)
                            <option value="{{$datos->descripcion}}">{{ $datos->descripcion}} (Cantidad {{$datos->existencia}})</option>
                        @endforeach
                      </select>
                      <div style="display:none;"><input type="text" name="id_inv" id="id_inv"></div>
                    </div>
                </div>
                @foreach($productos as $datos)
                    <!--<input style="display: none;" type="text" name="cant{ {$datos['id']}}" id="cant{ {$datos['id']}}" value="{ {$datos['existencia']}}" />-->
                    <input style="display: none;" type="text" name="cant{{$datos->descripcion}}" id="cant{{$datos->descripcion}}" value="{{$datos->existencia}}" />
                @endforeach
                <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect02">Áreas</label>
                      </div>
                      <select class="custom-select" id="inputGroupSelect02">
                        <option value="0" selected hidden>Selecciona un área</option>
                        @foreach($proveedores as $datos)
                            <option value="{{$datos['id']}}">{{ $datos['area']}}</option>
                        @endforeach
                      </select>
                      <div style="display:none;"><input type="text" name="id_area" id="id_area"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Cantidad de productos que se entregan al área</label>
                    <input  autocomplete="off" name="existencia" id="existencia" class="form-control"
                           type="text" placeholder="Cantidad" >
                </div>

                <input type="hidden" name="id_socio" value="{{Auth::user()->id}}">

                
                <button class="btn btn-success" type="button" onclick="checarP()">Guardar</button>
                <a class="btn btn-primary" href="{{route("inventario.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
    <br>
    <h2>&nbsp;&nbsp;Salidas Registradas</h2>
    <div>&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="tableToExcel('example2', 'Salidas','Salidas')" type="button" class="btn btn-outline-success" id="exceltabla" name="exceltabla">EXCEL  <i class="fas fa-file-excel" aria-hidden="true"></i></button></div>

<div align='center' class="table-responsive col-md-12 order-md-1">
   <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%; ">
                    <thead style="text-align: center;" class="thead-dark" id="panel">
                        <tr>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Folio Salida</th>

                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Producto</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Area a la que se entregó</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Cantidad entregada</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de entrega</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Descargar reporte</th>


                        </tr>
                    </thead>
                    <tbody>

                        <!-- <input type="hidden" value="{{ $contador = 1 }}"> -->
                        @foreach ($salidas as $dato)
                        <tr>


                            <td align="center">{{$dato->id}}</td>
                            <td align="center">{{$dato->id_inv}}</td>
                            <td align="center" style="display: none;">{{$dato->id_area}}</td>
                            <td align="center">{{$dato->area}}</td>
                            <td align="center">{{$dato->existencia}}</td>
                            <td align="center">{{$dato->created_at}}</td>
                            

                             <td align="center">
                              <form action="{{route('inventario.descargarPDF')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id_a" id="id_a" value="{{$dato->id_area}}">
                                    <input type="hidden" name="desc" id="desc" value="{{$dato->id_inv}}">
                                    <input type="hidden" name="ca" id="ca" value="{{$dato->existencia}}">
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
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Folio Salida</th>

                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Producto</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Area a la que se entregó</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Cantidad entregada</th>
                            <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de entrega</th>
                            


                        </tr>
                    </thead>
                    <tbody>

                        <!-- <input type="hidden" value="{{ $contador = 1 }}"> -->
                        @foreach ($salidas as $dato)
                        <tr>


                            <td align="center">{{$dato->id}}</td>
                            <td align="center">{{$dato->id_inv}}</td>
                            
                            <td align="center">{{$dato->area}}</td>
                            <td align="center">{{$dato->existencia}}</td>
                            <td align="center">{{$dato->created_at}}</td>
                            

                            



                        </tr>

                        @endforeach
                    </tbody>
                </table>
</div>
@endsection
