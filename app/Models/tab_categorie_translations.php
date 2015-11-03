<?php

namespace FairHub\Models;

use Illuminate\Support\Facades\App;

class tab_categorie_translations extends HubModel
{
    protected $table = 'tab_categorie_translations';

    /**
     * Get the fair that owns this translation.
     */
    public function categorie()
    {
        return $this->belongsTo('FairHub\tab_categorie', 'categoria_id', 'cat_id', 'tab_categorie');
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

}
