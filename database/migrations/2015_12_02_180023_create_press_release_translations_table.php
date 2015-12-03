<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePressReleaseTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('press_release_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('press_release_id')->unsigned();
            $table->integer('language_id')->unsigned();

            $table->string('subhead')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('body');

            $table->unique(['press_release_id','language_id']);
            $table->foreign('press_release_id')->references('id')->on('press_releases')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('press_release_translations');
    }
}
