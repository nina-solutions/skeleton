<?php

namespace FairHub;

class REGIONI extends HubModel
{
    protected $table = 'REGIONI';
    public $timestamps = false;
    //Working with this kind of keys implies NO incrementing and some custom save functions
    public $incrementing = false;
    protected $primaryKey = [
        'CDT_UTE',
        'CDT_NOME_TAB',
        'CDT_CODICE'
    ];

    //CDT_UTE VARCHAR(2) NOT NULL,
    //CDT_NOME_TAB VARCHAR(4) NOT NULL,
    //CDT_CODICE VARCHAR(10) NOT NULL,
    //CDT_DESCR VARCHAR(40) NOT NULL,
    //CDT_CODICE_RICLA VARCHAR(10) NOT NULL,
    //PRIMARY KEY (CDT_UTE, CDT_NOME_TAB, CDT_CODICE)
}
