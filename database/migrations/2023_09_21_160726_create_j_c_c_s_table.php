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
        Schema::create('j_c_c_s', function (Blueprint $table) {
            $table->id();

            $table->string('nombres');
            $table->string('ape_pat');
            $table->string('ape_mat');
            $table->string('dni');
            $table->string('celular');
            $table->string('email');
            $table->string('codigo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('j_c_c_s');
    }
};
