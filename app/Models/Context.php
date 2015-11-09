<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

class Context extends HubModel
{
    protected $nullable = [
        'context_id',
        'description'
    ];
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
        switch(strlen($code)){
            case 2:
                $query->where('code', '=', substr($code,0,2))->whereNotNull('context_id');
                break;
            case 3:

                $query->where('code', '=', substr($code,0,3))->whereNull('context_id');
                break;
            case 5:
                $query->where('code', '=', substr($code,3,2))->whereNotNull('context_id');
                $query->whereHas('contextParent', function ($q) use ($code) {
                    $q->where('code', '=', substr($code,0,3));
                });
                break;
            default:
        }

        return $query;
    }
    /**
     * Get the code-related fair.
     */
    public function scopeDescNameLike($query, $text)
    {
        $query = $query->where(function($query) use ($text) {
            $query->where('description', 'ILIKE', "%$text%")
                ->orWhere('code', 'ILIKE', "%$text%");
        });
        return $query->where('description', 'ILIKE', "%$text%");
    }

    public function getFullCodeAttribute(){
        $parent = $this->contextParent()->first();
        if ($parent !== null)
            return $parent->fullCode . $this->code;
        return $this->code;
    }

    public function getParentNameAttribute(){
        $parent = $this->contextParent()->first();
        if ($parent !== null)
            return $parent->name;
        return null;
    }

    public function contextParent(){
        return $this->belongsTo('FairHub\Models\Context', 'context_id', 'id');
    }

    public function contextChilds(){
        return $this->hasMany('FairHub\Models\Context', 'id', 'context_id');
    }
}
