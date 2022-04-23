

@extends('layouts.aplicacion')

@section("content")
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
        //console.log($a+" "+$b);
        //console.log(id_prov);

        var aaa = "cant";
        aaa += id_pro;
        var cant = parseInt(document.getElementById(aaa).value); //$(aaa).val();
        console.log(cant);
        var ex = parseInt($('#existencia').val());
        console.log(ex);

        if(ex > cant){
            alert('La cantidad solicitada de productos supera el número que se tiene en el inventario.');
            //console.log('No agrega');
            /**/
        }else{
            if($a != '' && $b != ''){
                document.getElementById('formulario1').submit();
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
@endsection
