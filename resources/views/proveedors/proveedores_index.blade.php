

@extends('layouts.aplicacion')
@section("content")
@section("titulo", "proveedores")

    <div class="row">
        <div class="col-12">
            <h1>
                <br>

                Proveedores <i class="fa fa-users"></i></h1>
            <a href="{{route("proveedors.create")}}" class="btn btn-success mb-2">Agregar</a>
           
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Domicilio</th>
                        <th>Giro</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($proveedores as $proveedor)
                        <tr>
                            <td>{{$proveedor->nombre}}</td>
                            <td>{{$proveedor->telefono}}</td>
                            <td>{{$proveedor->domicilio}}</td>
                            <td>{{$proveedor->giro}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route("proveedors.edit",[$proveedor])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("proveedors.destroy", [$proveedor])}}" method="post">
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
