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
        Schema::create('VentasApp', function (Blueprint $table) {
            $table->id();
            $table->string('Bin', 15)->nullable();
            $table->string('Tarjeta', 10)->nullable();
            $table->string('Adicional1', 30)->nullable();
            $table->string('Idacquirer', 30)->nullable();
            $table->string('IdCommerce', 30)->nullable();
            $table->string('Tipo', 30)->nullable();
            $table->string('Banco', 100)->nullable();
            $table->string('Codzip', 20)->nullable();
            $table->string('Mensaje', 50)->nullable();
            $table->string('IdTransaccion', 100)->nullable();
            $table->string('Correo', 60)->nullable();
            $table->decimal('Valor', 18)->nullable();
            $table->string('Direccion', 250)->nullable();
            $table->string('Pais', 30)->nullable();
            $table->string('Apellido')->nullable();
            $table->string('Cod_Autorizacion', 6)->nullable();
            $table->string('Nombre')->nullable();
            $table->string('Descripcion_productos', 50)->nullable();
            $table->string('CodReferenciaPago', 60)->nullable();
            $table->string('NumeroCompra', 30)->nullable();
            $table->integer('CodTienda')->nullable();
            $table->dateTime('Fecha')->nullable();
            $table->string('CodError', 5)->nullable();
            $table->string('hora', 10)->nullable();
            $table->string('Voucher', 50)->nullable();
            $table->integer('CuentaId')->nullable();
            $table->string('CuentaNombre', 50)->nullable();
            $table->float('Subtotal', 53, 0)->nullable();
            $table->float('Descuento', 53, 0)->nullable();
            $table->float('Iva', 53, 0)->nullable();
            $table->float('IvaAplicado', 53, 0)->nullable();
            $table->float('Comision', 53, 0)->nullable();
            $table->float('VentaDescuento', 53, 0)->nullable();
            $table->float('FidelizacionOpera', 53, 0)->nullable();
            $table->float('FidelizacionMerca', 53, 0)->nullable();
            $table->float('FidelizacionTotal', 53, 0)->nullable();
            $table->float('FidelizacionMonto', 53, 0)->nullable();
            $table->float('FidelizacionValor', 53, 0)->nullable();
            $table->foreign('CodTienda')->references('cod_restaurante')->on('restaurante')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('VentasApp');
    }
};
