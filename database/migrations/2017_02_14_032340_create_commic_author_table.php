<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommicAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_author', function (Blueprint $table)
        {
            $table->integer('id_comic')->unsigned();
            $table->foreign('id_comic')->references('id')->on('comics')->onDelete('cascade');

            $table->integer('id_autor')->unsigned();
            $table->foreign('id_autor')->references('id')->on('authors')->onDelete('cascade');

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
