<?php

namespace FairHub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class FairEdition extends Model
{
    /**
     * Get the fair that owns the edition.
     */
    public function fair()
    {
        return $this->belongsTo('FairHub\Fair');
    }

    /**
     * Get the translations that owns the fair edition.
     */
    public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany('FairHub\FairEditionTranslation');
    }

    /**
     * Build up the fair code
     */
    public function getFairCodeAttribute()
    {
        return $this->fair()->first()->code . substr($this->year,2,2);
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
                if (empty($desc)){
                    //fallback on fair description..no data sorry!
                    $desc = $this->fair()->first()->description;
                }
            }
        }
        return $desc;
    }

    /**
     * Build up the description
     */
    public function getTranslatedNameAttribute()
    {
        $lang = App::getLocale();
        $collect = $this->translation()->lang($lang)->first();
        if ($collect) {
            $name = $collect->name;
        }else{
            //fallback to language with id = 1, should be there
            $collect = $this->translation()->lang(1)->first();
            if ($collect) {
                $name = $collect->name;
            }else{
                //fallback on fair name..no data sorry!
                $name = $this->fair()->first()->name;
            }
        }
        return $name;
    }

    /**
     * Build up the description
     */
    public function getTranslatedLocationAttribute()
    {
        $lang = App::getLocale();
        $collect = $this->translation()->lang($lang)->first();
        if ($collect) {
            $location = $collect->location;
        }else{
            //fallback to language with id = 1, should be there
            $collect = $this->translation()->lang(1)->first();
            if ($collect) {
                $location = $collect->location;
            }else{
                //fallback on entity description, the less accurate
                $location = $this->location;
            }
        }
        return $location;
    }

    /**
     * Scope a query to only include active fair editions.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query, $active = true)
    {
        return $query->where('active', '=', $active);
    }

    /**
     * Scope a query to only include the fair edition that correspond to the given code
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCode($query, $code)
    {
        $fair_id = Fair::code($code)->first()->id;
        return $query
                ->where('fair_id', '=', $fair_id)
                ->where(function ($query) use ($code) {
                    $query
                        ->where('year', '=', '19'.substr($code, 3, 2))
                        ->orWhere('year', '=', '20'.substr($code, 3, 2));
                });
    }
}
