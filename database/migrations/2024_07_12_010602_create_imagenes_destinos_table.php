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
        Schema::create('imagenes_destinos', function (Blueprint $table) {
            $table->id();
            $table->string('url',100);
            $table->boolean('is_primary')->default(false);
            $table->unsignedBigInteger('destino_id')->nullable();

            $table->foreign('destino_id')->references('id')->on('destinos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes_destinos');
    }
};
