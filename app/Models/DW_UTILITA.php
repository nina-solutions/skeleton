<?php

namespace FairHub\Models;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\App;

class DW_UTILITA extends HubModel
{
    protected $table = 'DW_UTILITA';
    public $timestamps = false;

    protected $primaryKey = 'UT_ID';

    /**
     * @param $query Builder
     * @param $type string
     * @return Builder
     */
    public function scopeType($query, $type){
        return $query->where('UT_TIPO', '=', $type);
    }

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['UT_ID'];
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
            return $this->attributes['UT_CAMPO2'];
        //fallback on Italian for everything else
        return $this->attributes['UT_CAMPO1'];
    }

    public function anagrafiche(){
        return $this->hasManyThrough('FairHub\DW_ANAGRAFICHE','FairHub\DW_RELANAUTY','UTY_ID','ANA_ID','UT_ID');
    }


    //UT_ID INT NOT NULL,
    //UT_TIPO VARCHAR(50) NOT NULL,
    //UT_CAMPO1 VARCHAR(250),
    //UT_CAMPO2 VARCHAR(250)
}
