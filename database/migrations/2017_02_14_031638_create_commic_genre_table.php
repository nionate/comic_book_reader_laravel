<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommicGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_genre', function (Blueprint $table)
        {
            $table->integer('id_comic')->unsigned();
            $table->foreign('id_comic')->references('id')->on('comics')->onDelete('cascade');

            $table->integer('id_genero')->unsigned();
            $table->foreign('id_genero')->references('id')->on('genres')->onDelete('cascade');

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
        //
    }
}
