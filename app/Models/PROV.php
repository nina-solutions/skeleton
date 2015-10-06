<?php

namespace FairHub\Models;
use Illuminate\Support\Facades\App;

class PROV extends HubModel
{
    protected $table = 'PROV';
    public $timestamps = false;
    //Working with this kind of keys implies NO incrementing and some custom save functions
    public $incrementing = false;
    protected $primaryKey = [
        'cdt_ute',
        'cdt_nome_tab',
        'cdt_codice'
    ];

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['cdt_codice'];
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
            return $this->attributes['cdt_descr'];
        //fallback on Italian for everything else
        return $this->attributes['cdt_descr'];
    }
    //cdt_ute VARCHAR(2) NOT NULL,
    //cdt_nome_tab VARCHAR(4) NOT NULL,
    //cdt_codice VARCHAR(10) NOT NULL,
    //cdt_descr VARCHAR(40) NOT NULL,
    //cdt_codice_ricla VARCHAR(10) NOT NULL,
    //PRIMARY KEY (cdt_ute, cdt_nome_tab, cdt_codice)
}
