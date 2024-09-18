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
        Schema::create('destinos', function (Blueprint $table) {
            $table->id();
            $table->string('codigodestino',5);
            $table->string('tipoduracion',50);//full day y half day
            $table->string('nombredestino'); //titulo
            $table->string('resumendestino');//un resumen 
            $table->integer('duracion');//03 horas
            $table->Text('itinerario')->nullable();
            $table->Text('condiciones')->nullable();
            $table->Text('infoimportante')->nullable();
            $table->Text('otrosdatos')->nullable();
            $table->float('precioventa');
            $table->float('preciocompra');
            $table->float('preciomayorista');
            $table->float('priceoferta');
            $table->time('horainicial');
            $table->time('horafinal');
            $table->boolean('estado')->default(1);//0=anulado ; 1= activo, 
            $table->unsignedBigInteger('city_id')->nullable();//ciudad
            $table->unsignedBigInteger('subcategory_id')->nullable();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinos');
    }
};
