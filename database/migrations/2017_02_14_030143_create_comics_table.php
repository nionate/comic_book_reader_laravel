<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->string('titulo', 100);
            $table->integer('nro_paginas');
            $table->string('serie', 100);
            $table->string('idioma', 45);
            $table->string('img_portada', 255);
            $table->integer('id_editorial')->unsigned();
            $table->timestamps();

            Schema::enableForeignKeyConstraints();
            $table->foreign('id_editorial')->references('id')->on('editorials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
