<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $fillable = ['IdTransaccion','CodTienda', 'accion', 'datos'];
}
