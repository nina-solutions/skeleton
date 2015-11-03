<?php

namespace FairHub\Models;

class DW_RELANAGCATEG extends HubModel
{
    protected $table = 'DW_RELANAGCATEG';
    public $timestamps = false;
    //Working with this kind of keys implies NO incrementing and some custom save functions
    public $incrementing = false;
    protected $primaryKey = [
        'RMC_ANA_ID',
        'RMC_MAC_ID',
        'RMC_SOC_ID'
    ];

    protected $fillable = [
        'RMC_ANA_ID',
        'RMC_MAC_ID',
        'RMC_SOC_ID',
        'RMC_ALTRO',
    ];
    /*
    RMC_ANA_ID INT NOT NULL,
    RMC_MAC_ID INT NOT NULL,
    RMC_SOC_ID INT NOT NULL,
    RMC_ALTRO VARCHAR(200),
    PRIMARY KEY (RMC_ANA_ID, RMC_MAC_ID, RMC_SOC_ID)
    */
}
