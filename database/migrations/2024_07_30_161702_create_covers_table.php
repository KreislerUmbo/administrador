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
        Schema::create('covers', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->string('title');
            $table->dateTime('start_at');//vigencia de la portada
            $table->dateTime('end_at')->nullable();//hasta cuando estara en vigencia en la portada
            $table->boolean('is_active')->default(true); //para determinar si una imgaen se encuentra inactivo o activo
            $table->integer('order')->default(0);//para las ordenes de las imagenes

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covers');
    }
};
