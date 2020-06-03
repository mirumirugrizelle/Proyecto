<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->string("CURP")->primary();
            $table->string("nombre")->nullable(false);
            $table->string("apellido_paterno")->nullable(false);
            $table->string("apellido_materno")->nullable(false);
            $table->string("sexo")->nullable(false);
            $table->date("fecha_nacimiento")->nullable(false);
            $table->string("direccion")->nullable(false);
            $table->string("telefono_tutor")->nullable(false);
            $table->string("email")->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
