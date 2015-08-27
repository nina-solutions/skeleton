<?php

namespace FairHub;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\App;

class DW_SOTTOCATEGORIE extends HubModel
{
    protected $table = 'DW_SOTTOCATEGORIE';
    public $timestamps = false;

    protected $primaryKey = 'SOC_ID';

    /**
     * @param $query Builder
     * @param $code string faircode
     * @param $channel int role related channel
     * @return mixed Builder
     */
    public function scopeQualifiche($query, $code = null, $channel = 0){
        return $query->where('SOC_MAC_ID', '=',DW_MACROCATEGORIE::qualifications($channel)->fairCode($code)->select('MAC_ID')->first()->id);
    }

    /**
     * @param $query Builder
     * @param $visible boolean
     * @return mixed Builder
     */
    public function scopeVisible($query, $visible = true){
        return $query->where('SOC_VISIBILE', '=', ($visible?'SI':'NO'));
    }

    public function parentCategories(){
        return $this->hasOne('DW_MACROCATEGORIE', 'MAC_ID', 'SOC_MAC_ID');
    }

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getParentIdAttribute(){
        return $this->attributes['SOC_MAC_ID'];
    }

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['SOC_ID'];
    }

    //If you hate the way this Database is designed,
    //please use this method to automagically the right translated description
    /**
     * @return string
     */
    public function getDescriptionAttribute(){
        //If english return english description
        if (App::getLocale() == 'en')
            return $this->attributes['SOC_DESCRIZIONE_EN'];
        //If english return english description
        if (App::getLocale() == 'de')
            return $this->attributes['SOC_DESCRIZIONE_DE'];
        //If english return english description
        if (App::getLocale() == 'fr')
            return $this->attributes['SOC_DESCRIZIONE_FR'];
        //If english return english description
        if (App::getLocale() == 'es')
            return $this->attributes['SOC_DESCRIZIONE_ES'];
        //fallback on Italian for everything else
        return $this->attributes['SOC_DESCRIZIONE'];
    }

    //SOC_ID INT PRIMARY KEY NOT NULL,
    //SOC_MAC_ID INT NOT NULL,
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
