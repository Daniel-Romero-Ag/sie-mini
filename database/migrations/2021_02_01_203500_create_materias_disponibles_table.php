<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasDisponiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_disponibles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_materia');
            $table->foreign('id_materia')->references('id')->on('materias');
            $table->unsignedBigInteger('id_maestro')->nullable();
            $table->foreign('id_maestro')->references('id')->on('maestros');
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
        Schema::dropIfExists('materias_disponibles');
    }
}
