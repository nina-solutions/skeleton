<?php

namespace FairHub\Models;

use Illuminate\Support\Facades\App;

class tab_eventi_translations extends HubModel
{
    protected $table = 'tab_Eventi_translations';

    /**
     * Get the fair that owns this translation.
     */
    public function eventi()
    {
        return $this->belongsTo('FairHub\tab_eventi', 'eventi_id', 'eve_id', 'tab_eventi');
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
