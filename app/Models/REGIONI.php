<?php

namespace FairHub\Models;
use Illuminate\Support\Facades\App;

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

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['CDT_CODICE'];
    }

    //If you hate the way this Database is designed,
    //please use this method to automagically the right translated description
    //instead of dirty stuff like CAMPO1 and CAMPO2
    /**
     * @return string
     */
    public function getDescriptionAttribute(){
        //If english return english description
        if (App::getLocale() == 'en')
            return $this->attributes['CDT_DESCR'];
        //fallback on Italian for everything else
        return $this->attributes['CDT_DESCR'];
    }

    //CDT_UTE VARCHAR(2) NOT NULL,
    //CDT_NOME_TAB VARCHAR(4) NOT NULL,
    //CDT_CODICE VARCHAR(10) NOT NULL,
    //CDT_DESCR VARCHAR(40) NOT NULL,
    //CDT_CODICE_RICLA VARCHAR(10) NOT NULL,
    //PRIMARY KEY (CDT_UTE, CDT_NOME_TAB, CDT_CODICE)
}
