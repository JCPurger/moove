<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugar', function (Blueprint $table) {
            $table->increments('id');
            $table->float('latitude',18,15);
            $table->float('longitude',18,15);
            $table->string('nome');
            $table->string('categoria');//TODO: FAZER OUTRA RELACAO PARA CATEGORIAS
            $table->string('imagem')->nullable();
            $table->text('descricao');
            $table->unsignedInteger('id_user');

            $table->foreign('id_user')->references('id')->on('user');
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
        Schema::dropIfExists('lugar');
    }
}
