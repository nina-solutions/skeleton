<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabComunicati extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_comunicati', function (Blueprint $table) {
            $table->increments('com_id');
            $table->string('com_sopratitolo', 1000)->nullable();
            $table->string('com_titolo', 1000)->nullable();
            $table->string('com_sottotitolo', 1000)->nullable();
            $table->char('com_stato', 2)->nullable();
            $table->char('com_lingua', 2)->nullable();
            $table->string('com_nomefile', 50)->nullable();
            $table->dateTime('com_inizio')->nullable();
            $table->dateTime('com_fine')->nullable();
            $table->string('com_note', 100)->nullable();
            $table->integer('com_eve');
            $table->dateTime('com_timesc')->nullable();
            $table->dateTime('com_timesm')->nullable();
            $table->string('com_riferimento', 50)->nullable();
            $table->integer('com_categoria');
            $table->text('com_html_ita');
            $table->text('com_html_eng');

            $table->foreign('com_eve')->references('eve_id')->on('tab_eventi');
            $table->foreign('com_categoria')->references('cat_id')->on('tab_categorie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tab_comunicati');
    }
}
