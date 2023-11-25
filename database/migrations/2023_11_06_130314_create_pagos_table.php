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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            $table->string('cliente');
            $table->date('fecha_creacion');
            $table->float('capital');
            $table->float('saldo_prestamo');
            $table->float('saldo_deuda_hasta');
            $table->float('saldo_mora');
            $table->float('cuota_normal');
            $table->float('total_pagar');

            $table->foreignId('metodo_pago_id')->references('id')->on('metodo_pagos');

            $table->float('abono');
            $table->float('moras');
            $table->float('gas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
