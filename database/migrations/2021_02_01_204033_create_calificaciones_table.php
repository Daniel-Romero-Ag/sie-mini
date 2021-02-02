<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_maestros_materias_alumnos');
            $table->foreign('id_maestros_materias_alumnos')->references('id')->on('maestros_materias_alumnos');
            $table->string("unidad_1",200);
            $table->string("unidad_2",200);
            $table->string("unidad_3",200);
            $table->string("promedio",200);
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
        Schema::dropIfExists('calificaciones');
    }
}
