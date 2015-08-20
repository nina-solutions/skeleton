<?php

namespace FairHub;

class DW_UTILITA extends HubModel
{
    protected $table = 'DW_UTILITA';
    public $timestamps = false;

    protected $primaryKey = 'UT_ID';

    //UT_ID INT NOT NULL,
    //UT_TIPO VARCHAR(50) NOT NULL,
    //UT_CAMPO1 VARCHAR(250),
    //UT_CAMPO2 VARCHAR(250)
}
