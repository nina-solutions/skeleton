<?php

namespace FairHub;

class PROV extends HubModel
{
    protected $table = 'PROV';
    public $timestamps = false;
    //Working with this kind of keys implies NO incrementing and some custom save functions
    public $incrementing = false;
    protected $primaryKey = [
        'cdt_ute',
        'cdt_nome_tab',
        'cdt_codice'
    ];
    //cdt_ute VARCHAR(2) NOT NULL,
    //cdt_nome_tab VARCHAR(4) NOT NULL,
    //cdt_codice VARCHAR(10) NOT NULL,
    //cdt_descr VARCHAR(40) NOT NULL,
    //cdt_codice_ricla VARCHAR(10) NOT NULL,
    //PRIMARY KEY (cdt_ute, cdt_nome_tab, cdt_codice)
}
