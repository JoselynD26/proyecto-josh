<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $table = 'restaurante';
    protected $primaryKey = 'Cod_Restaurante';
    public $timestamps = false;

    public function cadena()
    {
        return $this->belongsTo(Cadena::class, 'Cod_Cadena');
    }

    public function transacciones()
    {
        return $this->belongsToMany(ST_Transaccional::class, 'VentasApp','CodTienda','IdTransaccion');
    }
}
