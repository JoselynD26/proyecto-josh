<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'auditoria';

    // Los atributos que se pueden asignar en masa
    protected $fillable = [
        'Cod_Cadena',
        'Cod_Restaurante',
        'fecha',
        'Codigo_App',
        'monto'
    ];

    // Los atributos que deben ser tratados como fechas
    protected $dates = [
        'fecha'
    ];

    // Si estás usando timestamps en la tabla
    public $timestamps = true;

    // Puedes definir relaciones si es necesario
    // Por ejemplo, si tienes una relación con un modelo de Tienda:
    // public function tienda()
    // {
    //     return $this->belongsTo(Tienda::class, 'Cod_Restaurante', 'id');
    // }
}
