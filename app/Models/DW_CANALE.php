<?php

namespace FairHub\Models;

class DW_CANALE extends HubModel
{
    protected $table = 'DW_CANALE';
    public $timestamps = false;

    protected $primaryKey = 'CAN_ID';
    protected $connection = 'dw';
    //increments('CAN_ID');
    //string('CAN_DESCRIZIONE', 50);
    //string('CAN_NOTE', 200);
    //string('CAN_VISIBILE', 2);
    //dateTime('CAN_TIMESC');
    //string('CAN_UTEC', 50);
}
