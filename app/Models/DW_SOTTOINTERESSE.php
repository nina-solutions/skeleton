<?php

namespace FairHub\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\App;

class DW_SOTTOINTERESSE extends HubModel
{
    protected $table = 'DW_SOTTOINTERESSE';
    public $timestamps = false;

    protected $primaryKey = 'SIN_ID';

    /**
     * @param $query Builder
     * @param $code string faircode
     * @param $channel int role related channel
     * @return mixed Builder
     */
    public function scopeType($query, $code = null, $type = "Visa Information"){

        $mac = DW_MACROINTERESSE::type($type)->fairCode($code)->select('MIN_ID')->first();

        if ($mac)
            $id = $mac->id;
        else
            $id = -1;

        return $query->where('SIN_MIN_ID', '=',$id);
    }


    /**
     * @param $query Builder
     * @param $visible boolean
     * @return mixed Builder
     */
    public function scopeVisible($query, $visible = true){
        return $query->where('SIN_VISIBILE', '=', ($visible?'SI':'NO'));
    }

    public function parentCategories(){
        return $this->hasOne('DW_MACROINTERESSE', 'MIN_ID', 'SIN_MIN_ID');
    }

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getParentIdAttribute(){
        return $this->attributes['SIN_MIN_ID'];
    }

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['SIN_ID'];
    }

    //If you hate the way this Database is designed,
    //please use this method to automagically the right translated description
    /**
     * @return string
     */
    public function getDescriptionAttribute(){
        //If english return english description
        if (App::getLocale() == 'en')
            return $this->attributes['SIN_DESCRIZIONE_EN'];
        //If english return english description
        if (App::getLocale() == 'de')
            return $this->attributes['SIN_DESCRIZIONE_DE'];
        //If english return english description
        if (App::getLocale() == 'fr')
            return $this->attributes['SIN_DESCRIZIONE_FR'];
        //If english return english description
        if (App::getLocale() == 'es')
            return $this->attributes['SIN_DESCRIZIONE_ES'];
        //fallback on Italian for everything else
        return $this->attributes['SIN_DESCRIZIONE'];
    }

    //SOC_ID INT PRIMARY KEY NOT NULL,
    //SOC_MIN_ID INT NOT NULL,
    //SOC_VISIBILE VARCHAR(2) NOT NULL,
    //SOC_DESCRIZIONE VARCHAR(100) NOT NULL,
    //SOC_DESCRIZIONE_EN VARCHAR(100) NOT NULL,
    //SOC_NOTE VARCHAR(200),
    //SOC_TIMESC DATETIME NOT NULL,
    //SOC_UTEC VARCHAR(50),
    //SOC_DESCRIZIONE_DE VARCHAR(100),
    //SOC_DESCRIZIONE_FR VARCHAR(100),
    //SOC_DESCRIZIONE_ES VARCHAR(100)
}
