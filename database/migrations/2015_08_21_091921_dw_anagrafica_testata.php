<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DwAnagraficaTestata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_ANAGRAFICA_TESTATA', function (Blueprint $table) {
            $table->increments('AS_ID');
            $table->integer('ANA_ID');
            $table->string('AS_TESSERA',15)->nullable();
            $table->string('AS_NOME_TESTATA',63);
            $table->string('AS_PERIODICITA',11)->nullable();
            $table->string('AS_ADDRESS',63)->nullable();
            $table->string('AS_CITY',63)->nullable();
            $table->string('AS_CAP',5)->nullable();
            $table->string('AS_COUNTRY',15)->nullable();
            $table->string('AS_STATES',30)->nullable();
            $table->string('AS_EMAIL',63);
            $table->string('AS_PHONE',63)->nullable();
            $table->string('AS_FAX',63)->nullable();
            $table->string('AS_MOBILE',63)->nullable();
            $table->text('AS_COMUNICAZIONI')->nullable();
            $table->dateTime('AS_INSRETTIME')->nullable();
            $table->string('AS_WWW',60)->nullable();
//            AS_ID INT PRIMARY KEY NOT NULL IDENTITY,
//            ANA_ID INT NOT NULL,
//            AS_TESSERA VARCHAR(15) NOT NULL,
//            AS_NOME_TESTATA VARCHAR(63) NOT NULL,
//            AS_PERIODICITA VARCHAR(11),
//            AS_ADDRESS VARCHAR(63),
//            AS_CITY VARCHAR(63),
//            AS_CAP VARCHAR(5),
//            AS_COUNTRY VARCHAR(15),
//            AS_STATES VARCHAR(30),
//            AS_EMAIL VARCHAR(63) NOT NULL,
//            AS_PHONE VARCHAR(63),
//            AS_FAX VARCHAR(63),
//            AS_MOBILE VARCHAR(63),
//            AS_COMUNICAZIONI TEXT,
//            AS_INSRETTIME DATETIME,
//            AS_WWW VARCHAR(60)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('DW_ANAGRAFICA_TESTATA');
    }
}
