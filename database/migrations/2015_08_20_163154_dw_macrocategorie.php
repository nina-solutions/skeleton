<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DwMacrocategorie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_MACROCATEGORIE', function (Blueprint $table) {
            $table->increments('MAC_ID');
            $table->string('MAC_ANALISI_IN', 5);
            $table->integer('MAC_ANNO');
            $table->string('MAC_MANIF', 3);
            $table->string('MAC_VISIBILE', 2);
            $table->string('MAC_DESCRIZIONE', 100);
            $table->string('MAC_DESCRIZIONE_EN', 100);
            $table->string('MAC_NOTE', 200)->nullable();
            $table->dateTime('MAC_TIMESC');
            $table->string('MAC_UTEC', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('DW_MACROCATEGORIE');
    }
}
