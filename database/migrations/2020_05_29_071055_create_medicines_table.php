<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('medicine_type_id');
            $table->string('description');
            $table->string('dose');
            $table->float('price');
            $table->integer('quantity');
            $table->integer('image_id')->unsigned()->index();

            //constraints
            $table->foreign('medicine_type_id')
                ->references('id')->on('medicine_types')
                ->onDelete('cascade');
            $table->foreign('image_id')
                ->references('id')->on('images')
                ->onDelete('cascade');


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
        Schema::dropIfExists('medicines');
    }
}
