<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabEventiTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_eventi_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('language_id');
            $table->integer('eventi_id');
            $table->string('description', 30);

            $table->unique(array('eventi_id', 'language_id'));

            $table->foreign('eventi_id')->references('eve_id')->on('tab_eventi');
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
        Schema::drop('tab_eventi_translations');
    }
}
