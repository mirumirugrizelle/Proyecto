<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscuelasProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas_profesores', function (Blueprint $table) {
            $table->string("CCT")->nullable(false);
            $table->string("idProfesor")->nullable(false);
            $table->foreign("CCT")->references("CCT")->on("escuelas");
            $table->foreign("idProfesor")->references("idProfesor")->on("profesores");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escuelas_profesores');
    }
}
