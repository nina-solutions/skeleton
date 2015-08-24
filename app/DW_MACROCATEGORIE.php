<?php

namespace FairHub;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\App;

class DW_MACROCATEGORIE extends HubModel
{
    protected $table = 'DW_MACROCATEGORIE';
    public $timestamps = false;

    protected $primaryKey = 'MAC_ID';

    public function scopeQualifications($query){
        return $query->where('MAC_DESCRIZIONE', 'LIKE', 'Qualifica%');
    }

    public function scopeFairCode($query, $code){
        return $query->where('MAC_ANALISI_IN', 'LIKE', $code);
    }

    public function subCategories(){
        return $this->hasMany('DW_SOTTOCATEGORIE', 'MAC_ID', 'MAC_ID');
    }

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['MAC_ID'];
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
            return $this->attributes['MAC_DESCRIZIONE_EN'];
        //fallback on Italian for everything else
        return $this->attributes['MAC_DESCRIZIONE'];
    }

    //MAC_ID INT PRIMARY KEY NOT NULL,
    //MAC_ANALISI_IN VARCHAR(5) NOT NULL,
    //MAC_ANNO INT NOT NULL,
    //MAC_MANIF VARCHAR(3) NOT NULL,
    //MAC_VISIBILE VARCHAR(2) NOT NULL,
    //MAC_DESCRIZIONE VARCHAR(100) NOT NULL,
    //MAC_DESCRIZIONE_EN VARCHAR(100) NOT NULL,
    //MAC_NOTE VARCHAR(200),
    //MAC_TIMESC DATETIME NOT NULL,
    //MAC_UTEC VARCHAR(50)
}
