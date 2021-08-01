<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->bigInteger('persona_id');
            $table->bigInteger('jefatura_id');
            $table->bigInteger('titulo_id');
            $table->bigInteger('puntos');
            $table->bigInteger('pregunta_id');
            $table->string('periodo', 40);
            $table->boolean('confirmado');
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
        Schema::dropIfExists('evaluas');
    }
}
