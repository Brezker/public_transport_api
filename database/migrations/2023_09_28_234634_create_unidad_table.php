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
        Schema::create('unidad', function (Blueprint $table) {
            $table->id();
            $table->biginteger('id_para');
            $table->biginteger('id_ruta');
            $table->string('num')->unique();
            $table->string('check');
            $table->string('act_inact');
            $table->string('h_salida');
            $table->string('h_llegada');
            $table->string('nota');
            //Foreign
            $table->foreign('id_para')->references('id')->on('parada')->onDelete('cascade');
            $table->foreign('id_ruta')->references('id')->on('ruta')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad');
    }
};
