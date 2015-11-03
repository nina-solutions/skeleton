<?php

namespace FairHub\Models;

use Illuminate\Support\Facades\App;

class tab_comunicati extends HubModel
{
    protected $table = 'tab_comunicati';
    public $timestamps = false;
    protected $primaryKey = 'com_id';


    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['com_id'];
    }

    //If you hate the way this Database is designed,
    //please use this method to automagically the right translated description
    /**
     * @return string
     */
    public function getTitleAttribute(){
        //If english return english description
        return $this->attributes['com_titolo'];
    }
    /**
     * @return string
     */
    public function getSupertitleAttribute(){
        //If english return english description
        return $this->attributes['com_sopratitolo'];
    }
    /**
     * @return string
     */
    public function getSubtitleAttribute(){
        //If english return english description
        return $this->attributes['com_sottotitolo'];
    }
    /**
     * @return string
     */
    public function getHtmlAttribute(){
        //If english return english description
        $lang = App::getLocale();
        if($lang == 'en')
            return $this->attributes['com_html_eng'];
        return $this->attributes['com_html_ita'];
    }
    /**
     * @return string
     */
    public function getNoteAttribute(){
        return $this->attributes['com_note'];
    }

    /**
     * @return string
     */
    public function getLangAttribute(){
        return $this->attributes['com_lingua'];
    }

    /**
     * Build up the description
     */
    public function getTranslatedAttribute($name)
    {
        $lang = App::getLocale();
        $collect = $this->translation()->lang($lang)->first();
        //First class translations are in dedicated table
        if ($collect) {
            $desc = $collect->$name;
        }else{
            //default language is ssecond class translations
            if($this->lang == $lang){
                $desc = $this->$name;
            }else {
                //fallback to language with id = 1, should be there
                $collect = $this->translation()->lang(1)->first();
                if ($collect) {
                    $desc = $collect->$name;
                } else {
                    //fallback on entity description, the less accurate
                    $desc = $this->$name;
                }
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

}
