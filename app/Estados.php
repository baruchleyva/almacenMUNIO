<?php
 ?>
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $fillable = ["CLAVE_ESTADO", "NOMBRE_ESTADO", "ABREV_ESTADO"];
}
