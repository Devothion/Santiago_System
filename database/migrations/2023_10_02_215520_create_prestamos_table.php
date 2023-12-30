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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('solicitud_id')->references('id')->on('solicituds');

            $table->foreignId('cliente_id')->references('id')->on('clientes');
            $table->foreignId('analista_id')->references('id')->on('analistas');

            $table->string('nombre_cliente');
            $table->string('estado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
