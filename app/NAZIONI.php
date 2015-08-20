<?php

namespace FairHub;

class NAZIONI extends HubModel
{
    //
    protected $table = 'NAZIONI';
    public $timestamps = false;
    //Working with this kind of keys implies NO incrementing and some custom save functions
    public $incrementing = false;
    protected $primaryKey = [
        'naz_ute',
        'naz_nazione'
    ];

    //naz_ute VARCHAR(2) NOT NULL,
    //naz_nazione VARCHAR(2) NOT NULL,
    //naz_descr_ita VARCHAR(50),
    //naz_descr_naz VARCHAR(50),
    //naz_valuta VARCHAR(3),
    //naz_lingua VARCHAR(3),
    //naz_nazione_03 VARCHAR(3),
    //PRIMARY KEY (naz_ute, naz_nazione)
}
