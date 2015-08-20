<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Canale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_CANALE', function (Blueprint $table) {
            $table->increments('CAN_ID');
            $table->string('CAN_DESCRIZIONE', 50)->nullable();
            $table->string('CAN_NOTE', 200)->nullable();
            $table->string('CAN_VISIBILE', 2);
            $table->dateTime('CAN_TIMESC')->nullable();
            $table->string('CAN_UTEC', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // we should not drop any tables,
        // until now the down is NOOP
        Schema::drop('DW_CANALE');
    }
}
