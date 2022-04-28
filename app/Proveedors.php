<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedors extends Model
{
    //protected $fillable = ["nombre", "telefono", "domicilio","giro"];
    protected $fillable = ["nombre",
    "denominacion",
    "estratificacion",
    "origenprov",
    "paisorigen",
    "rfc",
    "entidadf",
    "subcontra",
    "actieco",
    "domfiscal_noment",
    "domfiscal_claveent",
    "domfiscal_nommun",
    "domfiscal_clavemun",
    "domfiscal_nomloc",
    "domfiscal_claveloc",
    "domfiscal_nomasent",
    "domfiscal_tipoasent",
    "domfiscal_numex",
    "domfiscal_numint",
    "domfiscal_tipovial",
    "domfiscal_nomvial",
    "domfiscal_cp",
    "paisextra",
    "ciudadextra",
    "calleextra",
    "numextra",
    "nomreplegal",
    "appreplegal",
    "apmreplegal",
    "telreplegal",
    "emailreplegal",
    "tipoacredreplegal",
    "pagewebproveed",
    "telefono",
    "emailcomprov",
    "hiperrprovee",
    "hiperdprovee",
    "areasinfo",
    "fechaval",
    "fechaactu",
    "nota"];
}
