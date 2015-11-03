<?php

namespace FairHub\Models;
use Illuminate\Support\Facades\App;

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

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['naz_nazione'];
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
            return $this->attributes['naz_descr_naz'];
        //fallback on Italian for everything else
        return $this->attributes['naz_descr_ita'];
    }

    //naz_ute VARCHAR(2) NOT NULL,
    //naz_nazione VARCHAR(2) NOT NULL,
    //naz_descr_ita VARCHAR(50),
    //naz_descr_naz VARCHAR(50),
    //naz_valuta VARCHAR(3),
    //naz_lingua VARCHAR(3),
    //naz_nazione_03 VARCHAR(3),
    //PRIMARY KEY (naz_ute, naz_nazione)
}
