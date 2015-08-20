<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DwSottocategorie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_SOTTOCATEGORIE', function (Blueprint $table) {
            $table->increments('SOC_ID');
            $table->integer('SOC_MAC_ID');
            $table->string('SOC_VISIBILE', 2);
            $table->string('SOC_DESCRIZIONE', 100);
            $table->string('SOC_DESCRIZIONE_EN', 100);
            $table->string('SOC_NOTE', 200)->nullable();
            $table->dateTime('SOC_TIMESC');
            $table->string('SOC_UTEC', 50)->nullable();
            $table->string('SOC_DESCRIZIONE_DE', 100)->nullable();
            $table->string('SOC_DESCRIZIONE_FR', 100)->nullable();
            $table->string('SOC_DESCRIZIONE_ES', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('DW_SOTTOCATEGORIE');
    }
}
