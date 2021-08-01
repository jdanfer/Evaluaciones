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
            $table->bigIncrements('id');
            $table->string('persona_doc', 20);
            $table->string('persona_nom1', 50);
            $table->string('persona_nom2', 50);
            $table->string('persona_ape1', 50);
            $table->string('persona_ape2', 50);
            $table->date('persona_ingreso');
            $table->date('persona_nac');
            $table->string('persona_genero', 15);
            $table->bigInteger('cargo_id');
            $table->bigInteger('jefatura_id');
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
        Schema::dropIfExists('personas');
    }
}
