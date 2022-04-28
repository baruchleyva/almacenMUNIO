
@extends('layouts.aplicacion')
@section("content")
@section("titulo", "Agregar cliente")

    <div class="row">
        <div class="col-12">
            <h1> 
              <br>
            Agregar proveedor</h1>
            <form method="POST" action="{{route("proveedors.store")}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Nombre(s) del proveedor o contratista</label>
                            <input required autocomplete="off" name="nombre" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Denominación o razón social del proveedor o contratista</label>
                            <input required autocomplete="off" name="denominacion" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Estratificación</label>
                            <input required autocomplete="off" name="estratificacion" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Origen del proveedor o contratista (catálogo)</label>
                            <input required autocomplete="off" name="origenprov" class="form-control" type="text" placeholder="Nombre" value="Nacional">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">País de origen, si la empresa es una filial extranjera</label>
                            <input required autocomplete="off" name="paisorigen" class="form-control" type="text" placeholder="Nombre" value="No disponible">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">RFC de la persona física o moral con homoclave incluida</label>
                            <input required autocomplete="off" name="rfc" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Entidad federativa de la persona física o moral (catálogo)</label>
                            <input required autocomplete="off" name="entidadf" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Realiza subcontrataciones (catálogo)</label>
                            <input required autocomplete="off" name="subcontra" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Actividad económica de la empresa</label>
                            <input required autocomplete="off" name="actieco" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Tipo de vialidad (catálogo)</label>
                            <input required autocomplete="off" name="domfiscal_tipovial" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Nombre de la vialidad</label>
                            <input required autocomplete="off" name="domfiscal_nomvial" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Número exterior</label>
                            <input required autocomplete="off" name="domfiscal_numex" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Número interior, en su caso</label>
                            <input required autocomplete="off" name="domfiscal_numint" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Tipo de asentamiento (catálogo)</label>
                            <input required autocomplete="off" name="domfiscal_tipoasent" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Nombre del asentamiento</label>
                            <input required autocomplete="off" name="domfiscal_nomasent" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Clave de la localidad</label>
                            <input required autocomplete="off" name="domfiscal_claveloc" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Nombre de la localidad</label>
                            <input required autocomplete="off" name="domfiscal_nomloc" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Clave del municipio</label>
                            <input required autocomplete="off" name="domfiscal_clavemun" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Nombre del municipio o delegación</label>
                            <input required autocomplete="off" name="domfiscal_nommun" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Clave de la Entidad Federativa</label>
                            <input required autocomplete="off" name="domfiscal_claveent" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Entidad Federativa (catálogo)</label>
                            <input required autocomplete="off" name="domfiscal_noment" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Código postal</label>
                            <input required autocomplete="off" name="domfiscal_cp" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">País del domicilio en el extranjero, en su caso</label>
                            <input required autocomplete="off" name="paisextra" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Ciudad del domicilio en el extranjero, en su caso</label>
                            <input required autocomplete="off" name="ciudadextra" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Calle del domicilio en el extranjero, en su caso</label>
                            <input required autocomplete="off" name="calleextra" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Número del domicilio en el extranjero, en su caso</label>
                    <input required autocomplete="off" name="numextra" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Nombre(s) del representante legal de la empresa</label>
                    <input required autocomplete="off" name="nomreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                             <label class="label">Primer apellido del representante legal de la empresa</label>
                    <input required autocomplete="off" name="appreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Primer apellido del representante legal de la empresa</label>
                    <input required autocomplete="off" name="apmreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Teléfono de contacto representante legal de la empresa</label>
                    <input required autocomplete="off" name="telreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Correo electrónico representante legal, en su caso</label>
                    <input required autocomplete="off" name="emailreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Tipo de acreditación legal representante legal</label>
                    <input required autocomplete="off" name="tipoacredreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Página web del proveedor o contratista</label>
                    <input required autocomplete="off" name="pagewebproveed" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Teléfono oficial del proveedor o contratista</label>
                    <input required autocomplete="off" name="telefono" class="form-control"
                           type="text" placeholder="Teléfono">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Correo electrónico comercial del proveedor o contratista</label>
                    <input required autocomplete="off" name="emailcomprov" class="form-control"
                           type="text" placeholder="Correo electrónico comercial del proveedor o contratista">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Hipervínculo Registro Proveedores Contratistas, en su caso</label>
                    <input required autocomplete="off" name="hiperrprovee" class="form-control"
                           type="text" placeholder="Correo electrónico comercial del proveedor o contratista">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Hipervínculo al Directorio de Proveedores y Contratistas Sancionados</label>
                    <input required autocomplete="off" name="hiperdprovee" class="form-control"
                           type="text" placeholder="Correo electrónico comercial del proveedor o contratista">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Área(s) responsable(s) que genera(n), posee(n), publica(n) y actualizan la información</label>
                    <input required autocomplete="off" name="areasinfo" class="form-control"
                           type="text" placeholder="Correo electrónico comercial del proveedor o contratista">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Fecha de validación</label>
                    <input required autocomplete="off" name="fechaval" class="form-control"
                           type="text" placeholder="Correo electrónico comercial del proveedor o contratista">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Fecha de actualización</label>
                    <input required autocomplete="off" name="fechaactu" class="form-control"
                           type="text" placeholder="Correo electrónico comercial del proveedor o contratista">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="label">Nota</label>
                    <input required autocomplete="off" name="nota" class="form-control"
                           type="text" placeholder="Correo electrónico comercial del proveedor o contratista">
                        </div>
                    </div>
                </div>





                <!--<div class="form-group">
                    <label class="label">Domicilio</label>
                    <input required autocomplete="off" name="domicilio" class="form-control"
                           type="text" placeholder="Domicilio">
                </div>
                <div class="form-group">
                    <label class="label">Giro</label>
                    <input required autocomplete="off" name="giro" class="form-control"
                           type="text" placeholder="giro">
                </div>-->
                
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("proveedors.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection
