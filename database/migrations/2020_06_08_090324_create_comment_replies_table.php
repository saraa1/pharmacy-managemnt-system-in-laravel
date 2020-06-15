<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('comment_id');
            $table->string('name');
            $table->string('email');
            $table->text('body');
            $table->integer('image_id')->unsigned()->index()->nullable();
            $table->timestamps();

            //constraints
            $table->foreign('comment_id')->references('id')
                ->on('comments')->onDelete('cascade');
            $table->foreign('image_id')->references('id')
                ->on('images')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_replies');
    }
}
