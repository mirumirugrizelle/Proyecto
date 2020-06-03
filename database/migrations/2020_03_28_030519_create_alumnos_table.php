<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->string("idAlumno")->primary();
            $table->decimal("promedio",2,1,false)->nullable(true);
            $table->integer("grado")->unsigned()->nullable(false);
            $table->char("clase")->nullable(false);
            $table->date("fecha_ingreso")->nullable(false);
            $table->date("fecha_egreso")->nullable(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign(["grado","clase"])->references(["grado","letra"])->on("grupos");
            $table->foreign("idAlumno")->references("CURP")->on("personas");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
