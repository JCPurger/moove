<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comentario');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('place_id');
            //TODO: testar unique key dupla
//            $table->unique(array('user_id', 'place_id'));

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
        Schema::table('comment', function (Blueprint $table) {
            $table->dropForeign('comment_user_id_foreign');
            $table->dropForeign('comment_place_id_foreign');
        });
        Schema::dropIfExists('comment');
    }
}
