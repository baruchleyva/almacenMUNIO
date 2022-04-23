<?php
 ?>
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario_salidas extends Model
{
    protected $fillable = ["id_inv", "id_area", "existencia"];
}
