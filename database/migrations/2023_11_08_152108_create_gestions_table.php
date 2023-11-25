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
        Schema::create('gestions', function (Blueprint $table) {
            $table->id();

            $table->string('cliente');
            $table->date('fecha_operacion');
            $table->string('estado');
            $table->float('capital');
            $table->float('saldo_prestamo');
            $table->text('observaciones')->nullable();
            $table->boolean('compromiso_pago');
            $table->time('hora');
            $table->date('fecha_compromiso');
            $table->float('monto_compromiso');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestions');
    }
};
