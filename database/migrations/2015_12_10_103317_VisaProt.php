<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VisaProt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VISA_PROT', function (Blueprint $table) {

            $table->string('VP_ANALISI_IN',5);
            $table->integer('VP_NUMERO');
            $table->integer('VP_ANNO');
            $table->string('VP_TIPO',1)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('VISA_PROT');
    }
}


/*
CREATE TABLE VISA_PROT
(
    VP_ANALISI_IN VARCHAR(5) NOT NULL,
    VP_NUMERO INT NOT NULL,
    VP_ANNO INT NOT NULL,
    VP_TIPO VARCHAR(1)
);

 */