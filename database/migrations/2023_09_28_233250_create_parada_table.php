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
        Schema::create('parada', function (Blueprint $table) {
            $table->id();
            //$table->biginteger('id_usr');
            $table->string('nom_par');
            //$table->foreign('id_usr')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });


        $data = [
            ['nom_par' => 'Antena', 'created_at' => now(), 'updated_at' => now()],
            ['nom_par' => 'Terminal SPSC: Servicio Expresso', 'created_at' => now(), 'updated_at' => now()],
            ['nom_par' => 'Bonpane', 'created_at' => now(), 'updated_at' => now()],
            ['nom_par' => 'Loma Bonita', 'created_at' => now(), 'updated_at' => now()],
            ['nom_par' => 'Tecámac Centro', 'created_at' => now(), 'updated_at' => now()],
        ];


        DB::table('parada')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parada');
    }
};
