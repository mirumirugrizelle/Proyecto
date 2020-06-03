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
            $table->string("idAlumno")->nullable(false);
            $table->string("idMateria")->nullable(false);
            $table->decimal("p1",2,1,true)->nullable(true);
            $table->decimal("p2",2,1,true)->nullable(true);
            $table->decimal("p3",2,1,true)->nullable(true);
            $table->decimal("p4",2,1,true)->nullable(true);
            $table->decimal("p5",2,1,true)->nullable(true);
            $table->decimal("promedio",2,1,true)->nullable(true);
            $table->timestamps();
            $table->foreign("idAlumno")->references("idAlumno")->on("alumnos");
            $table->foreign("idMateria")->references("idMateria")->on("materias");
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
