<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DwSottointeresse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_SOTTOINTERESSE', function (Blueprint $table) {

            $table->increments('SIN_ID');
            $table->integer('SIN_MIN_ID');
            $table->string('SIN_VISIBILE',2);
            $table->string('SIN_DESCRIZIONE',100);
            $table->string('SIN_DESCRIZIONE_EN',100);
            $table->string('SIN_NOTE',200)->nullable();
            $table->dateTime('SIN_TIMESC');
            $table->string('SIN_UTEC', 50)->nullable();
            $table->integer('SIN_ORDINAMENTO')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('DW_SOTTOINTERESSE');
    }
}

/*
CREATE TABLE DW_SOTTOINTERESSE
(
    SIN_ID INT PRIMARY KEY NOT NULL,
    SIN_MIN_ID INT NOT NULL,
    SIN_VISIBILE VARCHAR(2) NOT NULL,
    SIN_DESCRIZIONE VARCHAR(100) NOT NULL,
    SIN_DESCRIZIONE_EN VARCHAR(100) NOT NULL,
    SIN_NOTE VARCHAR(200),
    SIN_TIMESC DATETIME DEFAULT '(getdate())' NOT NULL,
    SIN_UTEC VARCHAR(50) DEFAULT '('')',
    SIN_ORDINAMENTO INT
);
CREATE INDEX IX_DW_SOTTOINTERESSE ON DW_SOTTOINTERESSE (SIN_MIN_ID, SIN_VISIBILE);

 */