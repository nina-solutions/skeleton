<?php

namespace FairHub\Models;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\App;

class DW_MACROINTERESSE extends HubModel
{
    protected $table = 'DW_MACROINTERESSE';
    public $timestamps = false;

    protected $primaryKey = 'MIN_ID';

    public function scopeType($query, $type = "Visa Information"){

        return $query->where('MIN_DESCRIZIONE', 'ILIKE', 'Settore di interesse - '.  $type.'');
    }





    public function scopeFairCode($query, $code = null){
        if (null !== $code)
            return $query->where('MIN_ANALISI_IN', 'LIKE', $code);
        return $query;
    }

    public function scopeFairCodes($query){
        return $query->select('MIN_ANALISI_IN')->groupBy('MIN_ANALISI_IN');
    }

    public function subCategories(){
        return $this->hasMany('DW_SOTTOCATEGORIE', 'SIN_MIN_ID', 'MIN_ID');
    }

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['MIN_ID'];
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
            return $this->attributes['MIN_DESCRIZIONE_EN'];
        //fallback on Italian for everything else
        return $this->attributes['MIN_DESCRIZIONE'];
    }

    /**
     * @return int
     */
    public function getFairCodeAttribute(){
        return $this->attributes['MIN_ANALISI_IN'];
    }

    //MIN_ID INT PRIMARY KEY NOT NULL,
    //MIN_ANALISI_IN VARCHAR(5) NOT NULL,
    //MIN_ANNO INT NOT NULL,
    //MIN_MANIF VARCHAR(3) NOT NULL,
    //MIN_VISIBILE VARCHAR(2) NOT NULL,
    //MIN_DESCRIZIONE VARCHAR(100) NOT NULL,
    //MIN_DESCRIZIONE_EN VARCHAR(100) NOT NULL,
    //MIN_NOTE VARCHAR(200),
    //MIN_TIMESC DATETIME NOT NULL,
    //MIN_UTEC VARCHAR(50)
}
