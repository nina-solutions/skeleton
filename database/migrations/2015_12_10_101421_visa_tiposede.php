<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VisaTiposede extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('VISA_TIPOSEDE', function (Blueprint $table) {

            $table->string('VITS_CODICE',30);
            $table->string('VITS_NAZIONE_EN', 100);
            $table->string('VITS_TIPOSEDE', 255);
            $table->string('VITS_EMAIL1', 60);
            $table->string('VITS_EMAIL2', 60)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('VISA_TIPOSEDE');
    }
}
/*
CREATE TABLE VISA_TIPOSEDE
(
    VITS_CODICE VARCHAR(30),
    VITS_NAZIONE_EN VARCHAR(100),
    VITS_TIPOSEDE VARCHAR(255),
    VITS_EMAIL1 VARCHAR(60),
    VITS_EMAIL2 VARCHAR(60)
);
*/
