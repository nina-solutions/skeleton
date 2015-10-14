<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabCategorie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_categorie', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_descr', 100);
            $table->integer('cat_eve_id');
            $table->integer('cat_orderpres')->nullable();
            $table->string('cat_desc_eng', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tab_categorie');
    }
}
