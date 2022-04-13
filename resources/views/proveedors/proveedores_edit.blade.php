
@extends("maestra")
@section("titulo", "Editar proveedor")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>
               <br>
            Editar proveedor</h1>
            <form method="POST" action="{{route("proveedors.update", [$proveedor])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="{{$proveedor->nombre}}" autocomplete="off" name="nombre" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Teléfono</label>
                    <input required value="{{$proveedor->telefono}}" autocomplete="off" name="telefono"
                           class="form-control"
                           type="text" placeholder="Teléfono">
                </div>

                <div class="form-group">
                    <label class="label">Domicilio</label>
                    <input required value="{{$proveedor->domicilio}}" autocomplete="off" name="domicilio"
                           class="form-control"
                           type="text" placeholder="Domicilio">
                </div>

                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("proveedors.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection
