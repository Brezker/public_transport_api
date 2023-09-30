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
        Schema::create('checador', function (Blueprint $table) {
            $table->id(); // Esto creará una clave primaria automáticamente llamada "id"
            $table->string('nom_chec');
            $table->string('pass');
            $table->boolean('rol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checador');
    }
};
