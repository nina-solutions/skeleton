<?php

namespace FairHub\Models;

use Illuminate\Support\Facades\App;

class tab_comunicati_translations extends HubModel
{
    protected $table = 'tab_comunicati_translations';

    /**
     * Get the fair that owns this translation.
     */
    public function comunicati()
    {
        return $this->belongsTo('FairHub\Models\tab_comunicati', 'comunicati_id', 'com_id', 'tab_comunicati');
    }

    /**
     * Get the language that owns this translation.
     */
    public function language()
    {
        return $this->belongsTo('FairHub\Models\Language');
    }

    /**
     * Get the language that owns this translation.
     */
    public function scopeLang($query, $lang)
    {
        if(!is_integer($lang)){
            $lang = Language::code($lang)->first()->id;
        }
        return $query->where('language_id', '=', $lang);
    }


    /**
     * @return string
     */
    public function getTitleAttribute(){
        return $this->attributes['titolo'];
    }
    /**
     * @return string
     */
    public function getSubtitleAttribute(){
        return $this->attributes['sottotitolo'];
    }
    /**
     * @return string
     */
    public function getSupertitleAttribute(){
        return $this->attributes['sopratitolo'];
    }


}
