<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ST_Transaccional', function (Blueprint $table) {
            $table->string('Merchantid', 15)->nullable();
            $table->dateTime('Fecha_Transaccion')->nullable();
            $table->string('Hora_Transaccion', 10)->nullable();
            $table->char('Estado', 1)->nullable();
            $table->string('Numero_Lote', 8)->nullable();
            $table->decimal('Face_Value', 12)->nullable();
            $table->string('Id_Grupo_Tarjeta', 32)->nullable();
            $table->string('Id_Adquirente', 32)->nullable();
            $table->string('numero_tarjeta_mask', 24)->nullable();
            $table->string('Numero_Autorizacion', 15)->nullable();
            $table->string('Numero_Referencia', 50)->nullable();
            $table->string('Tipo_Transaccion', 2)->nullable();
            $table->string('Resultado_Externo', 2)->nullable();
            $table->integer('Tipo_Switch')->nullable();
            $table->integer('origen_Transaccion')->nullable();
            $table->string('Sistema', 10)->nullable();
            $table->string('Voucher', 50)->nullable();
            $table->string('CuentaNombre', 50)->nullable();
            $table->float('Subtotal', 53, 0)->nullable();
            $table->float('Descuento', 53, 0)->nullable();
            $table->float('Iva', 53, 0)->nullable();
            $table->float('IvaAplicado', 53, 0)->nullable();
            $table->float('FidelizacionOpera', 53, 0)->nullable();
            $table->float('FidelizacionMerca', 53, 0)->nullable();
            $table->float('FidelizacionTotal', 53, 0)->nullable();
            $table->float('FidelizacionValor', 53, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ST_Transaccional');
    }
};
