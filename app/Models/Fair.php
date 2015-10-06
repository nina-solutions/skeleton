<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use FairHub\FairTranslation;

class Fair extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function editions()
    {
        return $this->hasMany('FairHub\FairEdition');
    }

    /**
     * Get the code-related fair.
     */
    public function scopeCode($query, $code)
    {
        return $query->where('code', '=', substr($code,0,3));
    }

    /**
     * Get the translatinos that belongs to this fair.
     */
    public function translation()
    {
        return $this->hasMany('FairHub\FairTranslation');
    }

    /**
     * Get the translatinos that belongs to this fair.
     */
    public function getDescriptionAttribute()
    {
        $lang = App::getLocale();
        return $this->translation()->lang($lang)->first()->description;
    }

}
