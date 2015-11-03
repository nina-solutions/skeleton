<?php

namespace FairHub\Models;
use Illuminate\Support\Facades\App;

class DW_PERIODICITA extends HubModel
{
    protected $table = 'DW_PERIODICITA';
    public $timestamps = false;

    protected $primaryKey = 'PER_ID';

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['PER_ID'];
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
            return $this->attributes['PER_DESCRIZIONE_ENG'];
        //fallback on Italian for everything else
        return $this->attributes['PER_DESCRIZIONE_ITA'];
    }

    //PER_ID INT NOT NULL,
    //PER_DESCRIZIONE_ITA VARCHAR(100),
    //PER_DESCRIZIONE_ENG VARCHAR(100)
}
