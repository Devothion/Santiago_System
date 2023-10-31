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
        Schema::create('cuotas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('solicitud_id')->references('id')->on('solicituds');
            $table->date('fecha');
            $table->integer('numero');
            $table->float('cuota');
            $table->float('pagoCapital');
            $table->float('interes');
            $table->float('comision');
            $table->float('igv');
            $table->float('saldoCapital');
            $table->boolean('statusPago');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuotas');
    }
};
