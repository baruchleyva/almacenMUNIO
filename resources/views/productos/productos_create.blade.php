

@extends('layouts.aplicacion')

@section("content")
<script type="text/javascript">
    function checarP() {
        // body...
        var id_pro = $('#inputGroupSelect01').val();
        //console.log(id_pro);
        $('#idP').val(id_pro);
        $a = $('#idP').val();
        //console.log($a);
        if($a != ''){
            document.getElementById('formulario1').submit();
        }

    }
</script>
    <div class="row">
        <div class="col-12">
            <h1>
                <br>

            Agregar producto</h1>

            <form id="formulario1" method="POST" action="{{route("productos.store")}}">
                @csrf
                <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Proveedores</label>
                      </div>
                      <select class="custom-select" id="inputGroupSelect01">
                        <option value="0" selected hidden>Selecciona un proveedor</option>
                        @foreach($proveedores as $datos)
                            <option value="{{$datos['id']}}">{{ $datos['nombre']}}</option>
                        @endforeach
                      </select>
                      <input type="hidden" name="idP" id="idP">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label">Código de barras</label>
                    <input required autocomplete="off" name="codigo_barras" class="form-control"
                           type="text" placeholder="Código de barras" autofocus>
                </div>
                <div class="form-group">
                    <label class="label">Descripción</label>
                    <input required autocomplete="off" name="descripcion" class="form-control"
                           type="text" placeholder="Descripción">
                </div>
                <div class="form-group">
                    <label class="label">Precio de compra</label>
                    <input required autocomplete="off" name="precio_compra" class="form-control"
                           type="decimal(9,2)" placeholder="Precio de compra">
                </div>
                <div class="form-group">
                    <label class="label">Precio de venta</label>
                    <input required autocomplete="off" name="precio_venta" class="form-control"
                           type="decimal(9,2)" placeholder="Precio de venta">
                </div>
                <div class="form-group">
                    <label class="label">Existencia</label>
                    <input required autocomplete="off" name="existencia" class="form-control"
                           type="decimal(9,2)" placeholder="Existencia">
                </div>
                <input type="hidden" name="id_socio" value="{{Auth::user()->id}}">

                
                <button class="btn btn-success" type="button" onclick="checarP()">Guardar</button>
                <a class="btn btn-primary" href="{{route("productos.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection
