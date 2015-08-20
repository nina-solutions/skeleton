<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DwAnagrafiche extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DW_ANAGRAFICHE', function (Blueprint $table) {
            $table->increments('ANA_ID');
            $table->string('ANA_ANALISI_IN',5);
            $table->string('ANA_COGNOME',50)->nullable();
            $table->string('ANA_NOME',50)->nullable();
            $table->string('ANA_RAGSOC',50)->nullable();
            $table->string('ANA_UBICAZIONE',100)->nullable();
            $table->string('ANA_NCIV',20)->nullable();
            $table->string('ANA_CAP',20)->nullable();
            $table->string('ANA_LOCALITA',60)->nullable();
            $table->string('ANA_PROV',2)->nullable();
            $table->string('ANA_REGIONE',10)->nullable();
            $table->string('ANA_NAZIONE',3)->nullable();
            $table->string('ANA_STATO',30)->nullable();
            $table->string('ANA_WWW',60)->nullable();
            $table->string('ANA_EMAIL',60)->nullable();
            $table->string('ANA_TELEFONO',60)->nullable();
            $table->string('ANA_FAX',60)->nullable();
            $table->string('ANA_CELLULARE',60)->nullable();
            $table->integer('ANA_CANALE')->nullable();
            $table->string('ANA_CHIAVE',200)->nullable();
            $table->string('ANA_CONSENSO',2)->nullable();
            $table->dateTime('ANA_TIMESC');
            $table->string('ANA_UTEC',50)->nullable();
            $table->dateTime('ANA_TIMESM')->nullable();
            $table->string('ANA_UTEM',50)->nullable();
            $table->string('ANA_CODE20',20)->nullable();
            $table->string('ANA_CODE10',10)->nullable();
            $table->string('ANA_PWD',25)->nullable();
            $table->dateTime('ANA_DATA_NASCITA')->nullable();
            $table->string('ANA_LUOGO_NASCITA',60)->nullable();
            $table->binary('ANA_IMAGE1')->nullable();
            $table->binary('ANA_IMAGE2')->nullable();
            $table->binary('ANA_IMAGE3')->nullable();
            $table->string('ANA_FILENAME1',100)->nullable();
            $table->string('ANA_FILENAME2',100)->nullable();
            $table->string('ANA_FILENAME3',100)->nullable();
            $table->string('ANA_CONSENSOQRCODE',2)->nullable();
            $table->integer('ANA_IDRIACCREDITO')->nullable();
            $table->string('ANA_USERNAME',60)->nullable();
            $table->string('ANA_QUALIFICATESTO',200)->nullable();
            $table->string('ANA_PIVA',20)->nullable();
            $table->string('ANA_CFISCALE',20)->nullable();
            $table->string('ANA_BRANDNAME',500)->nullable();
            $table->integer('ANA_FLAGPAG')->nullable();
            $table->string('ANA_CONSENSO2',5)->nullable();
            $table->string('ANA_OPTIN',2)->nullable();
            $table->dateTime('ANA_DATA_OPTIN')->nullable();
            $table->tinyInteger('ANA_PRIMA_VISITA')->nullable();
            $table->string('ANA_TWITTER_ACCOUNT',20)->nullable();
            $table->string('ANA_FILENAME4',100)->nullable();
            $table->string('ANA_FILENAME5',100)->nullable();
            $table->binary('ANA_IMAGE4')->nullable();
            $table->binary('ANA_IMAGE5')->nullable();
            $table->string('ANA_LINK_ARTICOLI',1000)->nullable();
            $table->string('ANA_NOTE',500)->nullable();
            $table->string('ANA_SESSO',1)->nullable();

            /*
            ANA_ID INT NOT NULL IDENTITY,
            ANA_ANALISI_IN VARCHAR(5) NOT NULL,
            ANA_COGNOME VARCHAR(50),
            ANA_NOME VARCHAR(50),
            ANA_RAGSOC VARCHAR(50),
            ANA_UBICAZIONE VARCHAR(100),
            ANA_NCIV VARCHAR(20),
            ANA_CAP VARCHAR(20),
            ANA_LOCALITA VARCHAR(60),
            ANA_PROV VARCHAR(2),
            ANA_REGIONE VARCHAR(10),
            ANA_NAZIONE VARCHAR(3),
            ANA_STATO VARCHAR(30),
            ANA_WWW VARCHAR(60),
            ANA_EMAIL VARCHAR(60),
            ANA_TELEFONO VARCHAR(60),
            ANA_FAX VARCHAR(60),
            ANA_CELLULARE VARCHAR(60),
            ANA_CANALE INT,
            ANA_CHIAVE VARCHAR(200),
            ANA_CONSENSO VARCHAR(2),
            ANA_TIMESC DATETIME NOT NULL,
            ANA_UTEC VARCHAR(50),
            ANA_TIMESM DATETIME,
            ANA_UTEM VARCHAR(50),
            ANA_CODE20 VARCHAR(20),
            ANA_CODE10 VARCHAR(10),
            ANA_PWD VARCHAR(25),
            ANA_DATA_NASCITA DATETIME,
            ANA_LUOGO_NASCITA VARCHAR(60),
            ANA_IMAGE1 IMAGE,
            ANA_IMAGE2 IMAGE,
            ANA_IMAGE3 IMAGE,
            ANA_FILENAME1 VARCHAR(100),
            ANA_FILENAME2 VARCHAR(100),
            ANA_FILENAME3 VARCHAR(100),
            ANA_CONSENSOQRCODE VARCHAR(2),
            ANA_IDRIACCREDITO INT,
            ANA_USERNAME VARCHAR(60),
            ANA_QUALIFICATESTO VARCHAR(200),
            ANA_PIVA VARCHAR(20),
            ANA_CFISCALE VARCHAR(20),
            ANA_BRANDNAME VARCHAR(500),
            ANA_FLAGPAG INT,
            ANA_CONSENSO2 VARCHAR(5),
            ANA_OPTIN VARCHAR(2),
            ANA_DATA_OPTIN DATETIME,
            ANA_PRIMA_VISITA BIT,
            ANA_TWITTER_ACCOUNT VARCHAR(20),
            ANA_FILENAME4 VARCHAR(100),
            ANA_FILENAME5 VARCHAR(100),
            ANA_IMAGE4 IMAGE,
            ANA_IMAGE5 IMAGE,
            ANA_LINK_ARTICOLI VARCHAR(1000),
            ANA_NOTE VARCHAR(500),
            ANA_SESSO VARCHAR(1)
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
        Schema::drop('DW_ANAGRAFICHE');
    }
}
