<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $attributes = [
        'status_id' => 1,
    ];

    protected $fillable = [
        'name',
        'start',
        'end',
        'link',
        'description',
        'status_id',
        'content_id',
        'context_id'
    ];
    /**
     * Get the code-related fair.
     */
    public function scopeStatus($query, $code)
    {
        return $query->where('status', '=', (int)$code);
    }
    /**
     * Get the code-related fair.
     */
    public function scopeLike($query, $text)
    {
        return $query->where(function($query) use ($text) {
            $query->where('description', 'ILIKE', "%$text%")
                ->orWhere('name', 'ILIKE', "%$text%");
        });
    }

    public function getContextNameAttribute(){
        $parent = $this->context()->first();
        if ($parent !== null)
            return $parent->name;
        return null;
    }

    public function context(){
        return $this->hasOne('FairHub\Models\Context', 'id', 'context_id');
    }

    public function getParentNameAttribute(){
        $parent = $this->parentContent()->first();
        if ($parent !== null)
            return $parent->name;
        return null;
    }

    public function parentContent(){
        return $this->hasOne('FairHub\Models\Content', 'id', 'content_id');
    }
    public function status(){
        return $this->hasOne('FairHub\Models\Status', 'id', 'status_id');
    }

    public function transitions(){
        return StatusTransition::from($this->status_id)->get()->pluck('name', 'to_status_id');
    }

}
