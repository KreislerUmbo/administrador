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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nrodocumento');
            $table->string('nombres');
            $table->string('apellido');
            $table->string('razonsocial');
            $table->string('nombrecomercial');
            $table->string('representantelegal');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('email');
            $table->unsignedBigInteger('tipodocumento_id')->constrained();

            $table->foreign('tipodocumento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
