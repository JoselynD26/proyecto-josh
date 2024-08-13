<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ST_Transaccional extends Model
{
    use HasFactory;

    protected $table = 'ST_Transaccional';

    protected $primaryKey = 'Merchantid';

    protected $fillable = [
        'Fecha_Transaccion', 'Hora_Transaccion', 'Estado', 'Numero_Lote',
        'Face_Value', 'Id_Grupo_Tarjeta', 'Id_Adquirente', 'numero_tarjeta_mask',
        'Numero_Autorizacion', 'Numero_Referencia', 'Tipo_Transaccion',
        'Resultado_Externo', 'Tipo_Switch', 'origen_Transaccion', 'Sistema',
        'Voucher', 'CuentaNombre', 'Subtotal', 'Descuento', 'Iva', 'IvaAplicado',
        'FidelizacionOpera', 'FidelizacionMerca', 'FidelizacionTotal',
        'FidelizacionValor'
    ];

    public function restaurantes()
    {
        return $this->belongsToMany(Restaurante::class, 'VentasApp','CodTienda', 'IdTransaccion');
    }
}
