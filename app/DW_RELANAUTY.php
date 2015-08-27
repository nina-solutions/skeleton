<?php

namespace FairHub;

class DW_RELANAUTY extends HubModel
{
    protected $table = 'DW_RELANAUTY';
    public $timestamps = false;
    //Working with this kind of keys implies NO incrementing and some custom save functions
    public $incrementing = false;
    protected $primaryKey = [
        'UTY_ID',
        'ANA_ID'
    ];

    protected $fillable = [
        'UTY_ID',
        'ANA_ID'
    ];
}
