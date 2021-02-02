<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestrosMateriasAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestros_materias_alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('alumno_no_control',200);
            $table->foreign('alumno_no_control')->references('no_control')->on('alumnos');
            $table->unsignedBigInteger('id_maestros');
            $table->foreign('id_maestros')->references('id')->on('maestros');
            $table->unsignedBigInteger('id_materia');
            $table->foreign('id_materia')->references('id')->on('materias');
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
        Schema::dropIfExists('maestros_materias_alumnos');
    }
}
