<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VisaRichiestaFirst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('VISA_RICHIESTA', function (Blueprint $table) {

            $table->increments('VISA_ID');
            $table->string('VISA_MANIF',3);
            $table->integer('VISA_ANNO');
            $table->string('VISA_ANALISI_IN', 5);
            $table->string('VISA_CODESP', 9);
            $table->string('VISA_TIPORICHIESTA', 20);
            $table->string('VISA_TITOLO', 5);
            $table->string('VISA_NOME', 50);
            $table->string('VISA_COGNOME', 50);
            $table->string('VISA_POSIZIONE', 100);
            $table->string('VISA_RAGSOC', 100);
            $table->string('VISA_UBICAZIONE1', 60);
            $table->string('VISA_UBICAZIONE2', 60);
            $table->string('VISA_LOCALITA', 60);
            $table->string('VISA_STATO', 30);
            $table->string('VISA_NAZIONE', 60);
            $table->string('VISA_CAP', 10);
            $table->string('VISA_TEL', 20);
            $table->string('VISA_FAX', 20);
            $table->string('VISA_EMAIL', 60);
            $table->string('VISA_WWW', 60);
            $table->string('VISA_NPASS', 30);
            $table->string('VISA_PASSDATAEMISSIONE', 10);
            $table->string('VISA_PASSDATASCAD', 10);
            $table->string('VISA_LUOGONASCITA', 60);
            $table->string('VISA_DATANASCITA', 60);
            $table->string('VISA_AMBASCIATARICH', 30);
            $table->string('VISA_CONSOLATORICH', 30);
            $table->string('VISA_AMB_CONS_FAX', 20);
            $table->string('VISA_DAL', 10);
            $table->string('VISA_AL', 10);
            $table->string('VISA_PAD', 16);
            $table->string('VISA_STAND', 16);
            $table->dateTime('VISA_TIMESC');
            $table->dateTime('VISA_TIMESM');
            $table->string('VISA_EVASO',2);
            $table->string('VISA_EVASODA',25);
            $table->integer('VISA_PROTANNO');
            $table->integer('VISA_PROTNUMERO');
            $table->dateTime('VISA_PROTDATA');
            $table->integer('VISA_PROTNUMEROLETTERA');
            $table->string('VISA_PROTSIGLA',3);
            $table->string('VISA_SETTOREINTERESSE',50);
            $table->string('VISA_VITS_CODICE',30);
            $table->string('VISA_BACTIVITY',170);
            $table->string('VISA_HOTEL',200);
            $table->integer('VISA_TIPOSPESE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('VISA_RICHIESTA');
    }
}
/*
CREATE TABLE VISA_RICHIESTA
(
    VISA_ID INT NOT NULL IDENTITY,
    VISA_MANIF CHAR(3),
    VISA_ANNO INT,
    VISA_ANALISI_IN CHAR(5),
    VISA_CODESP VARCHAR(9),
    VISA_TIPORICHIESTA VARCHAR(20),
    VISA_TITOLO VARCHAR(5),
    VISA_NOME VARCHAR(50),
    VISA_COGNOME VARCHAR(50),
    VISA_POSIZIONE VARCHAR(100),
    VISA_RAGSOC VARCHAR(100),
    VISA_UBICAZIONE1 VARCHAR(60),
    VISA_UBICAZIONE2 VARCHAR(60),
    VISA_LOCALITA VARCHAR(60),
    VISA_STATO VARCHAR(30),
    VISA_NAZIONE VARCHAR(60),
    VISA_CAP VARCHAR(10),
    VISA_TEL VARCHAR(20),
    VISA_FAX VARCHAR(20),
    VISA_EMAIL VARCHAR(60),
    VISA_WWW VARCHAR(60),
    VISA_NPASS VARCHAR(30),
    VISA_PASSDATAEMISSIONE VARCHAR(10),
    VISA_PASSDATASCAD VARCHAR(10),
    VISA_LUOGONASCITA VARCHAR(60),
    VISA_DATANASCITA VARCHAR(60),
    VISA_AMBASCIATARICH VARCHAR(30),
    VISA_CONSOLATORICH VARCHAR(30),
    VISA_AMB_CONS_FAX VARCHAR(20),
    VISA_DAL VARCHAR(10),
    VISA_AL VARCHAR(10),
    VISA_PAD VARCHAR(16),
    VISA_STAND VARCHAR(16),
    VISA_TIMESC DATETIME,
    VISA_TIMESM DATETIME,
    VISA_EVASO CHAR(2) DEFAULT '('NO')',
    VISA_EVASODA VARCHAR(25),
    VISA_PROTANNO INT,
    VISA_PROTNUMERO INT,
    VISA_PROTDATA DATETIME,
    VISA_PROTNUMEROLETTERA INT,
    VISA_PROTSIGLA VARCHAR(3),
    VISA_SETTOREINTERESSE VARCHAR(50),
    VISA_VITS_CODICE VARCHAR(30),
    VISA_BACTIVITY VARCHAR(170),
    VISA_HOTEL VARCHAR(200),
    VISA_TIPOSPESE INT
);

*/
