<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedors extends Model
{
    protected $fillable = ["nombre", "telefono", "domicilio"];
}
