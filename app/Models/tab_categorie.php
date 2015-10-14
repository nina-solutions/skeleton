<?php

namespace FairHub\Models;
use Illuminate\Support\Facades\App;

class tab_categorie extends HubModel
{
    protected $table = 'tab_categorie';
    public $timestamps = false;
    protected $primaryKey = 'cat_id';

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['cat_id'];
    }

    //If you hate the way this Database is designed,
    //please use this method to automagically the right translated description
    /**
     * @return string
     */
    public function getDescriptionAttribute(){
        //If english return english description
        if (App::getLocale() == 'en')
            return $this->attributes['cat_desc_eng'];
        //fallback on Italian for everything else
        return $this->attributes['cat_desc'];
    }

    /**
     * Build up the description
     */
    public function getTranslatedDescriptionAttribute()
    {
        $lang = App::getLocale();
        $collect = $this->translation()->lang($lang)->first();
        if ($collect) {
            $desc = $collect->description;
        }else{
            //fallback to language with id = 1, should be there
            $collect = $this->translation()->lang(1)->first();
            if ($collect) {
                $desc = $collect->description;
            }else{
                //fallback on entity description, the less accurate
                $desc = $this->description;
            }
        }
        return $desc;
    }

    /**
     * Get the event related categories.
     */
    public function scopeEvent($query, $id)
    {
        return $query->where('eve_id', '=', $id);
    }

    /**
     * Get the translatinos that belongs to this fair.
     */
    public function translation()
    {
        return $this->hasMany('FairHub\tab_categorie_translations');
    }
}
