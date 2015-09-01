<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFairEditionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fair_edition_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fair_edition_id');
            $table->integer('language_id');
            $table->timestamps();
            $table->string('location');
            $table->string('description');
            $table->string('name');

            $table->foreign('fair_edition_id')->references('id')->on('fair_editions');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fair_edition_translations');
    }
}
