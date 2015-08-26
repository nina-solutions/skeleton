<?php

namespace FairHub;

class DW_ANAGRAFICA_TESTATA extends HubModel
{
    protected $table = 'DW_ANAGRAFICA_TESTATA';
    public $timestamps = false;

    protected $primaryKey = 'AS_ID';

    protected $fillable = [
        'ANA_ID',
        'AS_TESSERA',
        'AS_NOME_TESTATA',
        'AS_PERIODICITA',
        'AS_ADDRESS',
        'AS_CITY',
        'AS_CAP',
        'AS_COUNTRY',
        'AS_STATES',
        'AS_EMAIL',
        'AS_PHONE',
        'AS_FAX',
        'AS_MOBILE',
        'AS_COMUNICAZIONI',
        'AS_INSRETTIME',
        'AS_WWW',
    ];
    //AS_ID INT PRIMARY KEY NOT NULL IDENTITY,
    //ANA_ID INT NOT NULL,
    //AS_TESSERA VARCHAR(15) NOT NULL,
    //AS_NOME_TESTATA VARCHAR(63) NOT NULL,
    //AS_PERIODICITA VARCHAR(11),
    //AS_ADDRESS VARCHAR(63),
    //AS_CITY VARCHAR(63),
    //AS_CAP VARCHAR(5),
    //AS_COUNTRY VARCHAR(15),
    //AS_STATES VARCHAR(30),
    //AS_EMAIL VARCHAR(63) NOT NULL,
    //AS_PHONE VARCHAR(63),
    //AS_FAX VARCHAR(63),
    //AS_MOBILE VARCHAR(63),
    //AS_COMUNICAZIONI TEXT,
    //AS_INSRETTIME DATETIME,
    //AS_WWW VARCHAR(60)
}
