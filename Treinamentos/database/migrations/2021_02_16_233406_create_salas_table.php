<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('etapa1')->nullable(true);
            $table->string('etapa2')->nullable(true);
            $table->integer('lotacao')->nullable(true);

            #$table->integer('aluno_id')->unsigned()->nullable(true);
            #$table->foreign('aluno_id')->references('id')->on('pessoas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salas');
    }
}
