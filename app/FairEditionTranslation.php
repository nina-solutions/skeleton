<?php

namespace FairHub;

use Illuminate\Database\Eloquent\Model;

class FairEditionTranslation extends Model
{
    /**
     * Get the fair edition that owns this translation.
     */
    public function fairEdition()
    {
        return $this->belongsTo('FairHub\FairEdition');
    }

    /**
     * Get the fair that owns this translation.
     */
    public function language()
    {
        return $this->belongsTo('FairHub\Language');
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
}
