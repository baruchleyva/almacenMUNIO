<?php
 ?>
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $fillable = ["ID_MUNICIPIO", "ID_ESTADO", "CLAVE_MUNICIPIO", "NOMBRE_MUNICIPIO"];
}
