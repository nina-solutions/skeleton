<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DwRelanauty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_RELANAUTY', function (Blueprint $table) {
            $table->integer('UTY_ID');
            $table->integer('ANA_ID');
            $table->primary(array('UTY_ID', 'ANA_ID'));
            /*
            UTY_ID INT NOT NULL,
            ANA_ID INT NOT NULL
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('DW_RELANAUTY');
    }
}
