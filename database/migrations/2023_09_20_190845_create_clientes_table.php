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

            $table->string('nombres');
            $table->string('ape_pat');
            $table->string('ape_mat');
            $table->string('imagen');
            $table->foreignId('sucursal_id')->references('id')->on('sucursals');//
            $table->foreignId('jcc_id')->references('id')->on('j_c_c_s');//
            $table->foreignId('asesor_id')->references('id')->on('asesors');//
            $table->string('documento');
            $table->string('telefono');
            $table->foreignId('departamento_id')->references('id')->on('departamentos');//
            $table->foreignId('provincia_id')->references('id')->on('provincias');//
            $table->foreignId('distrito_id')->references('id')->on('distritos');//
            $table->string('zona');
            $table->string('nlote');
            $table->string('direccion');
            $table->text('referencia');
            $table->foreignId('tipo_cuenta_id')->references('id')->on('tipo_cuentas');//
            $table->foreignId('entidad_bancaria_id')->references('id')->on('entidad_bancarias');//
            $table->string('cuentafi');
            $table->string('entidadter')->nullable();
            $table->string('cuentater')->nullable();
            $table->string('titularter')->nullable();
            $table->boolean('aval');
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
