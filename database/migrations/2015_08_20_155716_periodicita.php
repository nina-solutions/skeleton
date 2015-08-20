<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Periodicita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_PERIODICITA', function (Blueprint $table) {
            $table->increments('PER_ID');
            $table->string('PER_DESCRIZIONE_ITA', 100);
            $table->string('PER_DESCRIZIONE_ENG', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('DW_PERIODICITA');
    }
}
