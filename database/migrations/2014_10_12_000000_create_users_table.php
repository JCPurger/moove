<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('imagem_perfil')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->tinyInteger('tipo');
            $table->string('cpf', 11)->nullable(); //11 caracteres
            $table->string('cnpj', 14)->nullable(); //14 caracteres
            $table->string('endereco')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
