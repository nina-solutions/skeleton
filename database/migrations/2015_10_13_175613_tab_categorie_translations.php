<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabCategorieTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_categorie_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('language_id');
            $table->integer('categorie_id');
            $table->string('descr', 100);

            $table->unique(array('categorie_id', 'language_id'));

            $table->foreign('categorie_id')->references('cat_id')->on('tab_categorie');
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
        Schema::drop('tab_categorie_translations');
    }
}
