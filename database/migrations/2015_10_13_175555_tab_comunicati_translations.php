<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabComunicatiTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_comunicati_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('language_id');
            $table->integer('comunicati_id');
            $table->string('sopratitolo', 1000)->nullable();
            $table->string('titolo', 1000)->nullable();
            $table->string('sottotitolo', 1000)->nullable();
            $table->text('html');
            $table->string('note', 100)->nullable();

            $table->unique(array('comunicati_id', 'language_id'));

            $table->foreign('comunicati_id')->references('com_id')->on('tab_comunicati');
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
        Schema::drop('tab_comunicati_translations');
    }
}
