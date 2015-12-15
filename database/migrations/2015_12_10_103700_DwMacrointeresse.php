<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DwMacrointeresse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_MACROINTERESSE', function (Blueprint $table) {

            $table->increments('MIN_ID');
            $table->string('MIN_ANALISI_IN',5);
            $table->integer('MIN_ANNO');
            $table->string('MIN_MANIF', 3);
            $table->string('MIN_VISIBILE',2);
            $table->string('MIN_DESCRIZIONE',100);
            $table->string('MIN_DESCRIZIONE_EN',100);
            $table->string('MIN_NOTE',200)->nullable();
            $table->dateTime('MIN_TIMESC');
            $table->string('MIN_UTEC', 50)->nullable();
            $table->integer('MIN_ORDINAMENTO')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('DW_MACROINTERESSE');
    }
}

/*
CREATE TABLE DW_MACROINTERESSE
(
    MIN_ID INT PRIMARY KEY NOT NULL,
    MIN_ANALISI_IN VARCHAR(5) NOT NULL,
    MIN_ANNO INT NOT NULL,
    MIN_MANIF VARCHAR(3) NOT NULL,
    MIN_VISIBILE VARCHAR(2) NOT NULL,

    MIN_DESCRIZIONE VARCHAR(100) NOT NULL,
    MIN_DESCRIZIONE_EN VARCHAR(100) NOT NULL,
    MIN_NOTE VARCHAR(200),
    MIN_TIMESC DATETIME DEFAULT '(getdate())' NOT NULL,
    MIN_UTEC VARCHAR(50) DEFAULT '('')',
    MIN_ORDINAMENTO INT
);
CREATE INDEX IX_DW_MACROINTERESSE ON DW_MACROINTERESSE (MIN_ANALISI_IN, MIN_VISIBILE);

 */