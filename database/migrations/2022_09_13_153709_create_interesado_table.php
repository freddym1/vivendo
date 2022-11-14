<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteresadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interesado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->string('correo',50);
            $table->string('telefono',30);
            $table->string('ciudad',30);
            $table->string('pais',30);
            $table->unsignedBigInteger('proyecto_id');
            $table->date('fecha');
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
        Schema::dropIfExists('interesado');
    }
}
