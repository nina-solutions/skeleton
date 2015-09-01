<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFairTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fair_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fair_id');
            $table->integer('language_id');
            $table->timestamps();

            $table->string('name');

            $table->foreign('fair_id')->references('id')->on('fairs');
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
        Schema::drop('fair_translations');
    }
}
