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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_videjuegos')
                  ->nullable()
                  ->constrained('videojuegos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_aulas')
                  ->nullable()
                  ->constrained('aulas')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->string('tiempo_inicio');
            $table->string('tiempo_fin');
            $table->date('fecha');
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
        Schema::dropIfExists('horarios');
    }
};
