<?php

namespace FairHub\Models;

class Language extends HubModel
{
    protected $fillable = [
        'code',
        'description'
    ];
    /**
     * Get the langauge with that code.
     */
    public function scopeCode($query, $code)
    {
        return $query->where('code', '=', substr($code,0,2));
    }

}
