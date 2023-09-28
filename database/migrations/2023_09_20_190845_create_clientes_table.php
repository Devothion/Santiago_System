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

            $table->string('imagen');
            $table->string('sucursal');
            $table->string('jcc');
            $table->text('asesor');
            $table->string('documento');
            $table->string('nombres');
            $table->string('ape_pat');
            $table->string('ape_mat');
            $table->string('telefono');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('zona');
            $table->string('nlote');
            $table->string('direccion');
            $table->text('referencia');
            $table->string('tipoCuenta')->nullable();
            $table->string('entidad');
            $table->string('cuentafi');
            $table->string('entidadter')->nullable();
            $table->string('cuentater')->nullable();
            $table->string('titularter')->nullable();
            $table->boolean('aval');//
            $table->string('documentoav')->nullable();
            $table->string('nombresav')->nullable();
            $table->string('ape_patav')->nullable();
            $table->string('ape_matav')->nullable();
            $table->string('direccionav')->nullable();
            $table->string('celularav')->nullable();
            $table->text('observ')->nullable();

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
