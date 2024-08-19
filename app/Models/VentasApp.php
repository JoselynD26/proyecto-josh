<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VentasApp extends Model
{
    // Nombre de la tabla si no sigue la convención plural
    protected $table = 'ventasApp';

    // Clave primaria en la tabla si no es auto incrementable o si es diferente
    //    protected $primaryKey = 'id'; // Ajusta según el nombre de tu clave primaria

    protected $fillable = [
        'CodTienda',
        'Descripcion',
        'IdTransaccion'
    ];


    public $timestamps = false;

    // Define la relación con la tabla Restaurante
    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class, 'Cod_Tienda', 'Cod_Restaurante');
    }

}

