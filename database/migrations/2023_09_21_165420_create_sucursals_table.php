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
        Schema::create('sucursals', function (Blueprint $table) {
            $table->id();

            $table->string('sucursal');
            $table->foreignId('departamento_id')->references('id')->on('departamentos');
            $table->foreignId('provincia_id')->references('id')->on('provincias');
            $table->foreignId('distrito_id')->references('id')->on('distritos');;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursals');
    }
};
