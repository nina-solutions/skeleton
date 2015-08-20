<?php

namespace FairHub;

class DW_PERIODICITA extends HubModel
{
    protected $table = 'DW_PERIODICITA';
    public $timestamps = false;

    protected $primaryKey = 'PER_ID';

    //PER_ID INT NOT NULL,
    //PER_DESCRIZIONE_ITA VARCHAR(100),
    //PER_DESCRIZIONE_ENG VARCHAR(100)
}
