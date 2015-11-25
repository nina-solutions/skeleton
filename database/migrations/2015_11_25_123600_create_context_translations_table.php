<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContextTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('context_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('context_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('description');

            $table->unique(['context_id','language_id']);

            $table->foreign('context_id')->references('id')->on('contexts')->onDelete('cascade');
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
        Schema::drop('context_translations');
    }
}
