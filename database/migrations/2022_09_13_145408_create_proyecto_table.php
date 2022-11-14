<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->text('descripcion');
            $table->unsignedBigInteger('ciudad_id');
            $table->unsignedBigInteger('constructora_id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('direccion',150);
            $table->integer('num_habitaciones');
            $table->integer('num_banos');
            $table->decimal('precio', 11,0);
            $table->timestamps();

            $table->foreign('ciudad_id')->references('id')->on('ciudad');
            $table->foreign('constructora_id')->references('id')->on('constructora');
            $table->foreign('categoria_id')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
}
