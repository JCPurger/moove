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
        Schema::create('place', function (Blueprint $table) {
            $table->increments('id');
            $table->float('latitude',18,15);
            $table->float('longitude',18,15);
            $table->string('nome');
            $table->string('imagem')->nullable();
            $table->text('descricao');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('category_id')->references('id')->on('category');
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
        Schema::table('place', function (Blueprint $table) {
            $table->dropForeign('place_user_id_foreign');
            $table->dropForeign('place_category_id_foreign');
        });
        Schema::dropIfExists('place');
    }
}
