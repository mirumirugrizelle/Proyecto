<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->integer("idPublicacion")->autoIncrement()->unsigned();
            $table->string("titulo")->nullable(false);
            $table->text("texto")->nullable(false);
            $table->string("imagen")->nullable(true);
            $table->integer("idTipo")->unsigned()->nullable(false);
            $table->foreign("idTipo")->references("idTipo")->on("tipos");
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
        Schema::dropIfExists('publicaciones');
    }
}
