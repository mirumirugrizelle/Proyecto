<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposMateriasAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_materias_aulas', function (Blueprint $table) {
            $table->integer("grado")->unsigned()->nullable(false);
            $table->char("letra")->nullable(false);
            $table->string("idMateria")->nullable(false);
            $table->string("idProfesor")->nullable(false);
            $table->integer("idAula")->unsigned()->nullable(false);
            $table->string("hora")->nullable(false);
            $table->timestamps();
            $table->foreign(["grado","letra"])->references(["grado","letra"])->on("grupos");
            $table->foreign("idMateria")->references("idMateria")->on("materias");
            $table->foreign("idProfesor")->references("idProfesor")->on("profesores");
            $table->foreign("idAula")->references("idAula")->on("aulas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_materias_aulas');
    }
}
