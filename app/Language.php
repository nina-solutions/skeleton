<?php

namespace FairHub;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * Get the code-related fair.
     */
    public function scopeCode($query, $code)
    {
        return $query->where('code', '=', substr($code,0,2));
    }
}
