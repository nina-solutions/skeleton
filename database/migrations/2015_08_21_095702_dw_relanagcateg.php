<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DwRelanagcateg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_RELANAGCATEG', function (Blueprint $table) {
            $table->integer('RMC_ANA_ID');
            $table->integer('RMC_MAC_ID');
            $table->integer('RMC_SOC_ID');
            $table->string('RMC_ALTRO', 200);
            $table->primary(array('RMC_ANA_ID','RMC_MAC_ID','RMC_SOC_ID'));

            /*
            RMC_ANA_ID INT NOT NULL,
            RMC_MAC_ID INT NOT NULL,
            RMC_SOC_ID INT NOT NULL,
            RMC_ALTRO VARCHAR(200),
            PRIMARY KEY (RMC_ANA_ID, RMC_MAC_ID, RMC_SOC_ID)
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
        Schema::drop('DW_RELANAGCATEG');
    }
}
