<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('alumno_no_control',200);
            $table->foreign('alumno_no_control')->references('no_control')->on('alumnos');
            $table->unsignedBigInteger('id_materia_disponible');
            $table->foreign('id_materia_disponible')->references('id')->on('materias_disponibles');
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
        Schema::dropIfExists('materias_alumnos');
    }
}
