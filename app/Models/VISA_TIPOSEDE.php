<?php

namespace FairHub\Models;
use Illuminate\Support\Facades\App;

class VISA_TIPOSEDE extends HubModel
{
    //
    protected $table = 'VISA_TIPOSEDE';
    public $timestamps = false;
    //Working with this kind of keys implies NO incrementing and some custom save functions
    public $incrementing = false;
    protected $primaryKey = [
        'VITS_CODICE'
    ];
    protected $connection = 'mn';


    public function scopeNation($query, $nationId) {
        $query->where('VITS_NAZIONE_EN','=',$nationId);

        return $query;
    }


    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['VITS_CODICE'];
    }

    //If you hate the way this Database is designed,
    //please use this method to automagically the right translated description
    //instead of dirty stuff like CAMPO1 and CAMPO2
    /**
     * @return string
     */
    public function getDescriptionAttribute(){
        return $this->attributes['VITS_NAZIONE_EN'];
    }

    //vits_codice VARCHAR(30) NOT NULL,
    //vits_nazione_en VARCHAR(100) NOT NULL,
    //vits_tiposede VARCHAR(255) NOT NULL,
    //vits_email1 VARCHAR(60) NOT NULL,
    //vits_email2 VARCHAR(60) NOT NULL,
    //PRIMARY KEY (vits_codice)
}
