<?php

namespace FairHub;

use Illuminate\Database\Eloquent\Model;

class FairTranslation extends Model
{
    /**
     * Get the fair that owns this translation.
     */
    public function fair()
    {
        return $this->belongsTo('FairHub\Fair');
    }

    /**
     * Get the language that owns this translation.
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
