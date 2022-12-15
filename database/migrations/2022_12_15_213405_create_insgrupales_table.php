<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insgrupales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jugadores')
                  ->nullable()
                  ->constrained('jugadores')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_equipos')
                  ->nullable()
                  ->constrained('equipos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_videjuegos')
                  ->nullable()
                  ->constrained('videojuegos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->string('participantes');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insgrupales');
    }
};
