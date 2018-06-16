<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('place_id');

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('place_id')->references('id')->on('place')->onDelete('cascade');
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
        Schema::table('favorite', function (Blueprint $table) {
            $table->dropForeign('favorite_user_id_foreign');
            $table->dropForeign('favorite_place_id_foreign');
        });
        Schema::dropIfExists('favorite');
    }
}
