<?php

namespace FairHub\Models;

use Illuminate\Support\Facades\App;

class tab_eventi extends HubModel
{
    protected $table = 'tab_eventi';
    public $timestamps = false;
    protected $primaryKey = 'eve_id';

    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['eve_id'];
    }

    //If you hate the way this Database is designed,
    //please use this method to automagically the right translated description
    /**
     * @return string
     */
    public function getDescriptionAttribute(){
        //If english return english description
        return $this->attributes['eve_desc'];
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
     * Get the translatinos that belongs to this fair.
     */
    public function translation()
    {
        return $this->hasMany('FairHub\Models\tab_eventi_translations');
    }

    /**
     * Get the comments for the blog post.
     */
    public function categories()
    {
        return $this->hasMany('FairHub\Models\tab_categorie', 'eve_id', 'cat_eve_id');
    }
}
