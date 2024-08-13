<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cadena extends Model
{
    protected $table = 'Cadena';
    protected $primaryKey = 'cod_cadena';
    public $timestamps = false;

    protected $fillable = [
        'Cod_Cadena',
        'Descripcion'
    ];

    public function restaurantes()
    {
        return $this->hasMany(Restaurante::class, 'Cod_Restaurante', $this->primaryKey);
    }
}
