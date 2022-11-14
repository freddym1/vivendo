<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoImagenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_imagen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proyecto_id');
            $table->string('archivo');
            $table->timestamps();

            $table->foreign('proyecto_id')->references('id')->on('proyecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_imagen');
    }
}
