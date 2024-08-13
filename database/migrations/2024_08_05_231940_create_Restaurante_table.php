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
        Schema::create('Restaurante', function (Blueprint $table) {
            $table->increments('Cod_Restaurante');
            $table->integer('Cod_Cadena')->nullable();
            $table->integer('Cod_Ciudad')->nullable();
            $table->integer('Cod_Categoria')->nullable();
            $table->integer('Cod_Registradora')->nullable();
            $table->integer('Cod_TipoRestaurante')->nullable();
            $table->string('Cod_Tienda', 4)->nullable();
            $table->string('Nombre_ODBC', 50)->nullable();
            $table->string('Planta', 15)->nullable();
            $table->string('Descripcion', 80)->nullable();
            $table->string('Direccion', 100)->nullable();
            $table->string('Telefono', 50)->nullable();
            $table->string('Dimension_AX', 50);
            $table->integer('Numero_Luch')->nullable();
            $table->string('Filtro_Articulos', 2)->nullable();
            $table->integer('Fisica_Dias')->nullable();
            $table->integer('PYG_Dias')->nullable();
            $table->integer('Servicio')->nullable();
            $table->integer('Estado')->nullable();
            $table->integer('Cod_Ubicacion_Cadenas')->nullable();
            $table->integer('Domicilio')->nullable();
            $table->string('Correo', 150)->nullable();
            $table->string('Gerente_Local', 100)->nullable();
            $table->dateTime('Fecha_Apertura')->nullable();
            $table->dateTime('Fecha_Cierre')->nullable();
            $table->string('Codigo_SRI', 3)->nullable();
            $table->string('Tamano', 50)->nullable();
            $table->string('Localizacion', 15)->nullable();
            $table->integer('Costeo')->nullable();
            $table->integer('Autoimpresor')->nullable();
            $table->string('SwitchT', 50)->nullable();
            $table->integer('Cupon_Automatico')->nullable();
            $table->string('Prefijo', 4)->nullable();
            $table->integer('Desde')->nullable();
            $table->integer('Hasta')->nullable();
            $table->bigInteger('Resolucion')->nullable();
            $table->dateTime('Fecha_Resolucion')->nullable();
            $table->string('CentroCostoPLT', 10)->nullable();
            $table->string('Celular', 15)->nullable();
            $table->string('Num_Establec_SRI', 5)->nullable();
            $table->string('Sitio', 10)->nullable();
            $table->integer('PedidoSugerido')->nullable();
            $table->smallInteger('Tipo_Nomina')->nullable();
            $table->integer('CompraImportada')->nullable();
            $table->string('serie', 3)->nullable();
            $table->string('PuntoEmision', 5)->nullable();
            $table->integer('NumeroAperturas')->nullable();
            $table->integer('Interfaz')->nullable();
            $table->integer('MaxPoint')->nullable();
            $table->string('Cod_Bankard', 50)->nullable();
            $table->string('Mid_Datafast', 50)->nullable();
            $table->string('Cod_Amex', 50)->nullable();
            $table->string('Cod_Dinners', 50)->nullable();
            $table->string('Jefe_Area', 100)->nullable();
            $table->string('Auditor_Restaurante', 100)->nullable();
            $table->float('Fondo_CCH', 53, 0)->nullable();
            $table->integer('ZonaCero')->nullable();
            $table->integer('Aeropuerto')->nullable();
            $table->integer('CalculoInventario')->nullable();
            $table->string('TipoAsignacion', 15)->nullable();
            $table->string('Localizacion_Api', 3)->nullable();
            $table->string('CentroCostoSAP', 20)->nullable();
            $table->string('Macromatix', 10)->nullable();
            $table->string('linkgooglemaps')->nullable();

            $table->primary(['Cod_Restaurante'], 'pk_restaurante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Restaurante');
    }
};
