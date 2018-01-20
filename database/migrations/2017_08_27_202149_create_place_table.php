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
            $table->string('categoria');//FAZER OUTRA RELACAO PARA CATEGORIAS
            $table->string('imagem')->nullable();
            $table->text('descricao');
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
