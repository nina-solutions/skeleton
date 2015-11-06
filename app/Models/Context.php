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
        'description',
        'context_id'
    ];
    /**
     * Get the code-related fair.
     */
    public function scopeCode($query, $code)
    {
        return $query->where('code', '=', substr($code,0,5));
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

    public function getParentNameAttribute(){
        $parent = $this->context()->first();
        if ($parent !== null)
            return $parent->name;
        return null;
    }

    public function context(){
        return $this->hasOne('FairHub\Models\Context', 'id', 'context_id');
    }
}
