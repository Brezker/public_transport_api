<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ruta', function (Blueprint $table) {
            $table->id();
            $table->string('nom_ruta');
            $table->timestamps();
        });


        $data = [
            ['nom_ruta' => 'Tecámac -  Tonanitla', 'created_at' => now(), 'updated_at' => now()],
            ['nom_ruta' => 'Tonanitla - Tecámac', 'created_at' => now(), 'updated_at' => now()],

        ];


        DB::table('ruta')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruta');
    }
};
