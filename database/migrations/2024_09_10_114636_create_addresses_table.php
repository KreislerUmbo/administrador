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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('type'); //1= domiciklio 
            $table->string('description');
            $table->string('district');
            $table->string('reference');
            $table->integer('receiver');//1=recibe la compra es 1 mismo y 2  el que recibe la compra es otra
            $table->json('receiver_info');
            $table->boolean('default')->default(false); //determina a la direccion por defecto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
