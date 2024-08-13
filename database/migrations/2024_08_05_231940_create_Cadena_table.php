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
        Schema::create('Cadena', function (Blueprint $table) {
            $table->increments('Cod_Cadena');
            $table->integer('Cod_Cliente')->nullable();
            $table->string('Descripcion', 40)->nullable();
            $table->string('Compania', 4)->nullable();
            $table->string('ABR', 3)->nullable();
            $table->string('Letra_Cadena', 1)->nullable();
            $table->string('Dimension', 3)->nullable();
            $table->string('Dimension_Planta', 20)->nullable();
            $table->float('Porcen_Canjes', 53, 0)->nullable();
            $table->integer('Tipo_Regalia')->nullable();
            $table->integer('Monedas_Tevcol')->nullable();
            $table->string('Tipo_Impuesto', 12)->nullable();
            $table->string('Logo', 50)->nullable();
            $table->string('DestinoAX', 50)->nullable();
            $table->integer('Estado')->nullable();
            $table->integer('Cod_Pais')->nullable();
            $table->integer('Plus_Domicilio')->nullable();
            $table->integer('Tolerancia')->nullable();
            $table->boolean('Stock_Inventario')->nullable();
            $table->string('Inicial_Cadena', 4)->nullable();
            $table->integer('DepositoPixel')->nullable();
            $table->string('Nombre_Comercial', 200)->nullable();
            $table->integer('Cod_empresa')->nullable();
            $table->string('centroCostoERP', 20)->nullable();
            $table->string('CentroRecepcion', 4)->nullable();
            $table->string('CentroBeneficioCuponesERP', 50)->nullable();
            $table->string('ZitCadena', 6)->nullable();

            $table->primary(['Cod_Cadena'], 'pk_cadena');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cadena');
    }
};
