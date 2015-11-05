<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

class Context extends Model
{
    protected $fillable = [
        'code',
        'name',
        'start',
        'end',
        'link',
        'description'
    ];
    /**
     * Get the code-related fair.
     */
    public function scopeCode($query, $code)
    {
        return $query->where('code', '=', substr($code,0,2));
    }
    /**
     * Get the code-related fair.
     */
    public function scopeLike($query, $text)
    {
        $query = $query->where(function($query) use ($text) {
            $query->where('description', 'ILIKE', "%$text%")
                ->orWhere('code', 'ILIKE', "%$text%");
        });
        return $query->where('description', 'ILIKE', "%$text%");
    }
}