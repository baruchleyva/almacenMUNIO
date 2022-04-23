<?php
 ?>
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventarios extends Model
{
    protected $fillable = ["id_producto", "id_proveedor", "existencia", "cantidad"];
}
