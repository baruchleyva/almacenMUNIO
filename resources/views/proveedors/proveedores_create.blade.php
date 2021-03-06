
@extends('layouts.aplicacion')
@section("content")
@section("titulo", "Agregar cliente")

<script type="text/javascript">
    function getEntidad() {
        var e = document.getElementById("entidad_1");
        var clave = e.value;
        var entidad = e.options[e.selectedIndex].text;
        console.log(entidad);
        $("#domfiscal_noment").val(entidad);
        $("#domfiscal_claveent").val(clave);

        //ajax
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('getMunicipios') }}",
            type:"post",
            async:false,
            data: {clave:clave},
            success: function(result){
                console.log(result);
                var numM = result.length;
                var  valores = "<select id='municipio_1' class='form-control' aria-label='Default select example' onchange='getMuni()'><option selected hidden>SELECCIONA UN MUNICIPIO</option>";
                for (var i = 0; i < numM; i++) {
                    valores += "<option value='"+result[i].CLAVE_MUNICIPIO+"'>"+result[i].NOMBRE_MUNICIPIO+"</option>";
                }
                valores += "</select>";
                $("#divmuni").html(valores);
            }
        });
    }
    function getMuni() {
        var e = document.getElementById("municipio_1");
        var clave = e.value;
        var entidad = e.options[e.selectedIndex].text;
        $("#domfiscal_nommun").val(entidad);
        $("#domfiscal_clavemun").val(clave);
    }
    function getEntidad1() {
        var e = document.getElementById("entidad_2");
        var entidad = e.options[e.selectedIndex].text;
        //console.log(entidad);
        $("#entidadf").val(entidad);
    }
</script>
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
                            <input  autocomplete="off" name="nombre" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Denominaci??n o raz??n social del proveedor o contratista</label>
                            <input  autocomplete="off" name="denominacion" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Estratificaci??n</label>
                            <input  autocomplete="off" name="estratificacion" class="form-control" type="text" placeholder="Nombre" value="No disponible">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Origen del proveedor o contratista (cat??logo)</label>
                            <input  autocomplete="off" name="origenprov" class="form-control" type="text" placeholder="Nombre" value="Nacional">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Pa??s de origen, si la empresa es una filial extranjera</label>
                            <input  autocomplete="off" name="paisorigen" class="form-control" type="text" placeholder="Nombre" value="No disponible">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">RFC de la persona f??sica o moral con homoclave incluida</label>
                            <input  autocomplete="off" name="rfc" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Entidad federativa de la persona f??sica o moral (cat??logo)</label>
                            <select id="entidad_2" class="form-control" aria-label="Default select example" onchange="getEntidad1()">
                                <option selected hidden>SELECCIONA UN ESTADO</option>
                                @foreach($estados as $estado)
                                    <option value="{{$estado['ID_ESTADO']}}">{{$estado['NOMBRE_ESTADO']}}</option>
                                @endforeach
                            </select>
                            <input style="display:none;"  autocomplete="off" name="entidadf" id="entidadf" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Realiza subcontrataciones (cat??logo)</label>
                            <input  autocomplete="off" name="subcontra" class="form-control" type="text" placeholder="Nombre" value="No">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Actividad econ??mica de la empresa</label>
                            <input  autocomplete="off" name="actieco" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Entidad Federativa (cat??logo)</label>
                            <select id="entidad_1" class="form-control" aria-label="Default select example" onchange="getEntidad()">
                                <option selected hidden>SELECCIONA UN ESTADO</option>
                                @foreach($estados as $estado)
                                    <option value="{{$estado['CLAVE_ESTADO']}}">{{$estado['NOMBRE_ESTADO']}}</option>
                                @endforeach
                            </select>
                            <input style="display:none;" autocomplete="off" name="domfiscal_noment" id="domfiscal_noment" class="form-control" type="text" placeholder="Entidad Federativa">
                            <input style="display:none;" autocomplete="off" name="domfiscal_claveent" id="domfiscal_claveent" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Nombre del municipio o delegaci??n</label>

                                <div id="divmuni"></div>
                            <input style="display:none;"  autocomplete="off" name="domfiscal_nommun" id="domfiscal_nommun" class="form-control" type="text" placeholder="Nombre">
                            <input style="display:none;"  autocomplete="off" name="domfiscal_clavemun" id="domfiscal_clavemun" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Nombre de la localidad</label>
                            <input  autocomplete="off" name="domfiscal_nomloc" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Clave de la localidad</label>
                            <input  autocomplete="off" name="domfiscal_claveloc" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Nombre del asentamiento</label>
                            <input  autocomplete="off" name="domfiscal_nomasent" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Tipo de asentamiento (cat??logo)</label>
                            <input  autocomplete="off" name="domfiscal_tipoasent" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: N??mero exterior</label>
                            <input  autocomplete="off" name="domfiscal_numex" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: N??mero interior, en su caso</label>
                            <input  autocomplete="off" name="domfiscal_numint" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Tipo de vialidad (cat??logo)</label>
                            <input  autocomplete="off" name="domfiscal_tipovial" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: Nombre de la vialidad</label>
                            <input  autocomplete="off" name="domfiscal_nomvial" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Domicilio fiscal: C??digo postal</label>
                            <input  autocomplete="off" name="domfiscal_cp" class="form-control" type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Pa??s del domicilio en el extranjero, en su caso</label>
                            <input  autocomplete="off" name="paisextra" class="form-control" type="text" placeholder="Nombre" value="No disponible">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Ciudad del domicilio en el extranjero, en su caso</label>
                            <input  autocomplete="off" name="ciudadextra" class="form-control" type="text" placeholder="Nombre" value="No disponible">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Calle del domicilio en el extranjero, en su caso</label>
                            <input  autocomplete="off" name="calleextra" class="form-control" type="text" placeholder="Nombre" value="No disponible">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">N??mero del domicilio en el extranjero, en su caso</label>
                            <input  autocomplete="off" name="numextra" class="form-control" type="text" placeholder="Nombre" value="">
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Nombre(s) del representante legal de la empresa</label>
                    <input  autocomplete="off" name="nomreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                             <label class="label">Primer apellido del representante legal de la empresa</label>
                    <input  autocomplete="off" name="appreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Segundo apellido del representante legal de la empresa</label>
                    <input  autocomplete="off" name="apmreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Tel??fono de contacto representante legal de la empresa</label>
                    <input  autocomplete="off" name="telreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Correo electr??nico representante legal, en su caso</label>
                    <input  autocomplete="off" name="emailreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Tipo de acreditaci??n legal representante legal</label>
                    <input  autocomplete="off" name="tipoacredreplegal" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">P??gina web del proveedor o contratista</label>
                    <input  autocomplete="off" name="pagewebproveed" class="form-control"
                           type="text" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Tel??fono oficial del proveedor o contratista</label>
                    <input  autocomplete="off" name="telefono" class="form-control"
                           type="text" placeholder="Tel??fono">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Correo electr??nico comercial del proveedor o contratista</label>
                    <input  autocomplete="off" name="emailcomprov" class="form-control"
                           type="text" placeholder="Correo electr??nico comercial del proveedor o contratista">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Hiperv??nculo Registro Proveedores Contratistas, en su caso</label>
                    <input  autocomplete="off" name="hiperrprovee" class="form-control"
                           type="text" placeholder="Correo electr??nico comercial del proveedor o contratista">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Hiperv??nculo al Directorio de Proveedores y Contratistas Sancionados</label>
                    <input  autocomplete="off" name="hiperdprovee" class="form-control"
                           type="text" placeholder="Correo electr??nico comercial del proveedor o contratista">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">??rea(s) responsable(s) que genera(n), posee(n), publica(n) y actualizan la informaci??n</label>
                    <input  autocomplete="off" name="areasinfo" class="form-control"
                           type="text" placeholder="Correo electr??nico comercial del proveedor o contratista">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Fecha de validaci??n</label>
                    <input  autocomplete="off" name="fechaval" class="form-control"
                           type="text" placeholder="Correo electr??nico comercial del proveedor o contratista">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Fecha de actualizaci??n</label>
                    <input  autocomplete="off" name="fechaactu" class="form-control"
                           type="text" placeholder="Correo electr??nico comercial del proveedor o contratista">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="label">Nota</label>
                    <input  autocomplete="off" name="nota" class="form-control"
                           type="text" placeholder="Correo electr??nico comercial del proveedor o contratista">
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
