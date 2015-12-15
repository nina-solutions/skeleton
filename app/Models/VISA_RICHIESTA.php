<?php

namespace FairHub\Models;
use Illuminate\Support\Facades\App;

class VISA_RICHIESTA extends HubModel
{
    //
    protected $table = 'VISA_RICHIESTA';
    public $timestamps = false;
    //Working with this kind of keys implies NO incrementing and some custom save functions
    public $incrementing = true;
    protected $primaryKey = 'VISA_ID';


    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['VISA_ID'];
    }

    /**
     * Scope for checking if a passport has been used
     * @param $query
     * @param $passportNumber
     * @param $code
     * @param $nation
     * @return mixed
     */
    public function scopePassportExists($query, $passportNumber, $code, $nation) {

        $query
            ->where('VISA_NPASS','=',$passportNumber)
            ->where('VISA_ANALISI_IN','=',$code)
            ->where('VISA_NAZIONE','=',$nation);

        return $query;

    }


    protected $fillable = [
        "VISA_ID",
        "VISA_MANIF",
        "VISA_ANNO",
        "VISA_ANALISI_IN",
        "VISA_CODESP",
        "VISA_TIPORICHIESTA",
        "VISA_TITOLO",
        "VISA_NOME",
        "VISA_COGNOME",
        "VISA_POSIZIONE",
        "VISA_RAGSOC",
        "VISA_UBICAZIONE1",
        "VISA_UBICAZIONE2",
        "VISA_LOCALITA",
        "VISA_STATO",
        "VISA_NAZIONE",
        "VISA_CAP",
        "VISA_TEL",
        "VISA_FAX",
        "VISA_EMAIL",
        "VISA_WWW",
        "VISA_NPASS",
        "VISA_PASSDATAEMISSIONE",
        "VISA_PASSDATASCAD",
        "VISA_LUOGONASCITA",
        "VISA_DATANASCITA",
        "VISA_AMBASCIATARICH",
        "VISA_CONSOLATORICH",
        "VISA_AMB_CONS_FAX",
        "VISA_DAL",
        "VISA_AL",
        "VISA_PAD",
        "VISA_STAND",
        "VISA_TIMESC" ,
        "VISA_TIMESM" ,
        "VISA_EVASO",
        "VISA_EVASODA",
        "VISA_PROTANNO",
        "VISA_PROTNUMERO",
        "VISA_PROTDATA" ,
        "VISA_PROTNUMEROLETTERA",
        "VISA_PROTSIGLA",
        "VISA_SETTOREINTERESSE",
        "VISA_VITS_CODICE",
        "VISA_BACTIVITY",
        "VISA_HOTEL",
        "VISA_TIPOSPESE"
    ];

    //"VISA_ID" SERIAL PRIMARY KEY NOT NULL,
    //"VISA_MANIF" VARCHAR(3) NOT NULL,
    //"VISA_ANNO",
    //"VISA_ANALISI_IN" VARCHAR(5) NOT NULL,
    //"VISA_CODESP" VARCHAR(9) NOT NULL,
    //"VISA_TIPORICHIESTA",
    //"VISA_TITOLO" VARCHAR(5) NOT NULL,
    //"VISA_NOME" VARCHAR(50) NOT NULL,
    //"VISA_COGNOME" VARCHAR(50) NOT NULL,
    //"VISA_POSIZIONE" VARCHAR(100) NOT NULL,
    //"VISA_RAGSOC" VARCHAR(100) NOT NULL,
    //"VISA_UBICAZIONE1",
    //"VISA_UBICAZIONE2" VARCHAR(60) NOT NULL,
    //"VISA_LOCALITA" VARCHAR(60) NOT NULL,
    //"VISA_STATO" VARCHAR(30) NOT NULL,
    //"VISA_NAZIONE" VARCHAR(60) NOT NULL,
    //"VISA_CAP",
    //"VISA_TEL" VARCHAR(20) NOT NULL,
    //"VISA_FAX" VARCHAR(20) NOT NULL,
    //"VISA_EMAIL" VARCHAR(60) NOT NULL,
    //"VISA_WWW" VARCHAR(60) NOT NULL,
    //"VISA_NPASS" VARCHAR(30) NOT NULL,
    //"VISA_PASSDATAEMISSIONE" VARCHAR(10) NOT NULL,
    //"VISA_PASSDATASCAD" VARCHAR(10) NOT NULL,
    //"VISA_LUOGONASCITA" VARCHAR(60) NOT NULL,
    //"VISA_DATANASCITA" VARCHAR(60) NOT NULL,
    //"VISA_AMBASCIATARICH" VARCHAR(30) NOT NULL,
    //"VISA_CONSOLATORICH" VARCHAR(30) NOT NULL,
    //"VISA_AMB_CONS_FAX" VARCHAR(20) NOT NULL,
    //"VISA_DAL" VARCHAR(10) NOT NULL,
    //"VISA_AL" VARCHAR(10) NOT NULL,
    //"VISA_PAD",
    //"VISA_STAND" VARCHAR(16) NOT NULL,
    //"VISA_TIMESC" ,
    //"VISA_TIMESM" TIMESTAMP(0) NOT NULL,
    //"VISA_EVASO",
    //"VISA_EVASODA" VARCHAR(25) NOT NULL,
    //"VISA_PROTANNO" INT NOT NULL,
    //"VISA_PROTNUMERO" INT NOT NULL,
    //"VISA_PROTDATA" TIMESTAMP(0) NOT NULL,
    //"VISA_PROTNUMEROLETTERA" INT NOT NULL,
    //"VISA_PROTSIGLA" VARCHAR(3) NOT NULL,
    //"VISA_SETTOREINTERESSE" VARCHAR(50) NOT NULL,
    //"VISA_VITS_CODICE" VARCHAR(30) NOT NULL,
    //"VISA_BACTIVITY" VARCHAR(170) NOT NULL,
    //"VISA_HOTEL" VARCHAR(200) NOT NULL,
    //"VISA_TIPOSPESE" INT NOT NULL

}
