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
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')->references('id')->on('clientes');
            $table->string('nombre_cliente');
            $table->string('estado');
            $table->string('tip_sol');
            $table->string('cta_asig');
            $table->date('fech_ate');
            $table->string('plazo');
            $table->float('mon_sol');
            $table->float('tas_int');
            $table->float('cap_int');
            $table->float('tas_mor');
            $table->string('fre_pag');
            $table->date('fpri_pag');
            $table->string('ana_cre');
            $table->text('observ')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};
