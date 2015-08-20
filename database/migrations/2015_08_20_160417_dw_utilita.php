<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DwUtilita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_UTILITA', function (Blueprint $table) {
            $table->increments('UT_ID');
            $table->string('UT_TIPO', 50);
            $table->string('UT_CAMPO1', 250)->nullable();
            $table->string('UT_CAMPO2', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('DW_UTILITA');
    }
}
