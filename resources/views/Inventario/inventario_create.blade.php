

@extends('layouts.aplicacion')

@section("content")
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

            <form id="formulario1" method="POST" action="{{route("inventario.store")}}">
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
                <a class="btn btn-primary" href="{{route("inventario.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection
