<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $table = 'restaurante';
    protected $primaryKey = 'Cod_Restaurante';
    public $timestamps = false;
    protected $fillable = [
        'Cod_Tienda',
        'Cod_Restaurante',
        'Descripcion'
    ];

    public function cadena()
    {
        return $this->belongsTo(Cadena::class, 'Cod_Cadena');
    }

    public function transacciones()
    {
        return $this->belongsToMany(ST_Transaccional::class, 'VentasApp','CodTienda','IdTransaccion');
    }
    public function ventas()
    {
        return $this->hasMany(VentasApp::class, 'CodTienda', 'Cod_Restaurante');
    }

}
